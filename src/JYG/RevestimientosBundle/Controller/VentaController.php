<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Venta;
use JYG\RevestimientosBundle\Form\VentaType;
use JYG\RevestimientosBundle\Entity\Bitacora;
# Para poder hacer los forms
use JYG\RevestimientosBundle\Entity\Item;
use JYG\RevestimientosBundle\Entity\Cliente;
use JYG\RevestimientosBundle\Form\ClienteType;


/**
 * Venta controller.
 *
 */
class VentaController extends Controller
{

    /**
     * Lists all Venta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Venta')->AllOrdenById();

        return $this->render('JYGRevestimientosBundle:Venta:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Venta entity.
     *
     */
    public function createAction(Request $request)
    {
        $session = $request->getSession();
        $entity = new Venta();
        $cliente = new Cliente();
        $item = new Item();
        $form = $this->createCreateForm($entity);
        $se_puede_vender = true;
        if ($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $clienteaux = $em->getRepository('JYGRevestimientosBundle:Venta')->BuscarPorRif($entity->getComprador()->getRif());
                
                //Operaciones respecto al cliente
                if (!$clienteaux){ //no existe el cliente
                    //Obtengo los datos del nuevo cliente
                    if($entity->getComprador()->getRif() == '' || $entity->getComprador()->getNombre() == '' || $entity->getComprador()->getDireccion() == '' || $entity->getComprador()->getTelefono()){            
                        $session->getFlashBag()->add('error','Debes elegir un usuario o agregar uno nuevo para poder realizar la venta. Por favor no dejes campos en blanco.');
                        $em = $this->getDoctrine()->getManager();
                        $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();
                        return $this->render('JYGRevestimientosBundle:Venta:new.html.twig', array(
                            'entity' => $entity,
                            'form'   => $form->createView(),
                            'clientes' => $clientes,
                        ));
                    }
                    $cliente->setRif($entity->getComprador()->getRif());
                    $cliente->setNombre($entity->getComprador()->getNombre());
                    $cliente->setDireccion($entity->getComprador()->getDireccion());
                    $cliente->setTelefono($entity->getComprador()->getTelefono());
                    
                    //Guardo al nuevo cliente la bd
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($cliente);
                    $em->flush();

                }else{
                    //Buscando el cliente que ya existe
                    $entity->setComprador($clienteaux[0]);
                }

                //Operaciones respecto a los items de la venta
                $item = $entity->getItems();
                $hasta = $item->count();
                //throw $this->createNotFoundException($hasta);
                for ($i=1; $i<=$hasta; $i++) { 
                    $item[$i]->setDescripcionmaterial($item[$i]->getCodigomaterial());     

                    $depositos = $item[$i]->getCodigomaterial();//El producto que está comprando
                    $cant_comprada = $item[$i]->getCantidad(); //Cantidad que pide el cliente

                    $almacenes = $depositos->getAlmacenes(); //obtiene los depositos en la bd del item i que se está comprando
                    $num_almacenes_disp = $almacenes->count();
                    
                    $datos = '';//con motivo de imprimir en el throw
                    $aux = $cant_comprada;
                    $cant_disponible = 0;
                    //Primero veo si puedo hacer la venta
                    for ($j=0; $j<$num_almacenes_disp; $j++){ $cant_disponible = $almacenes[$j]->getCantmaterialdisponible() + $cant_disponible; }
                    if($cant_disponible>=$aux){
                        //puedo vender el producto
                        ///////////////////////////////////////////////////////
                        //Caso con el 1er almacen
                        if($almacenes[0]->getCantmaterialdisponible()>=$aux && $aux!=0){
                            $descripcion = $item[$i]->getCodigomaterial().', '.$almacenes[0]->getNombrealmacen().'='.$aux;
                            $almacenes[0]->setCantmaterialdisponible($almacenes[0]->getCantmaterialdisponible()-$aux);
                            $aux = 0;
                        }
                        //caso con el 2do almacen
                        if ($num_almacenes_disp>1){ //si el producto tiene dos almacenes puede entrar aqui
                            if($almacenes[1]->getCantmaterialdisponible()>=$aux && $aux!=0){
                                $descripcion = $item[$i]->getCodigomaterial().', '.$almacenes[1]->getNombrealmacen().'='.$aux;
                                 $almacenes[1]->setCantmaterialdisponible($almacenes[1]->getCantmaterialdisponible()-$aux);
                                 $aux = 0;
                            }
                            //con ambos almacenes
                            if($almacenes[0]->getCantmaterialdisponible()>0 && $almacenes[1]->getCantmaterialdisponible()>0 && $aux!=0){
                                $aux = $aux - $almacenes[0]->getCantmaterialdisponible();
                                $descripcion = $item[$i]->getCodigomaterial().', '.$almacenes[0]->getNombrealmacen().'='.$almacenes[0]->getCantmaterialdisponible();
                                $almacenes[0]->setCantmaterialdisponible(0);
                                $almacenes[1]->setCantmaterialdisponible($almacenes[1]->getCantmaterialdisponible()-$aux);
                                $descripcion = $descripcion.' y '.$almacenes[1]->getNombrealmacen().'='.$aux;
                            }
                        }
                        //////////////////////////////////////////////////////
                        $item[$i]->setDescripcionmaterial($descripcion);
                        $session->getFlashBag()->add('exito','El producto "'.$item[$i]->getDescripcionmaterial().'" si se puede vender, hay la cantidad suficiente.');
                    }else{
                        //No se puede vender
                        $se_puede_vender = false;            
                        $session->getFlashBag()->add('error','No hay suficiente cantidad de "'.$item[$i]->getDescripcionmaterial().'" para realizar la venta');
                        $entity->removeItem($item[$i]);//Quitando el item que no se puede vender
                    }//se puedo vender
                }//End for
                if(!$se_puede_vender){
                    $em = $this->getDoctrine()->getManager();
                    $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();
                    $form = $this->createCreateForm($entity);
                    return $this->render('JYGRevestimientosBundle:Venta:new.html.twig', array(
                        'entity' => $entity,
                        'form'   => $form->createView(),
                        'clientes' => $clientes,
                        ));
                }else{
                    if ($hasta > 0) { //la venta tiene al menos un producto
                        $entity->setItems($item);
                        $em->persist($entity);
                        $em->flush();

                        /*Entrada en la bitacora*/
                        //$this->addLog($this->getUser()->getnombreUsuario(), 'Venta realizada a: '. $entity->getComprador()->getNombre());

                        //compro bien            
                        $this->addFlash('exito','La venta se ha realizado con éxito');

                        $entities = $em->getRepository('JYGRevestimientosBundle:Venta')->findAll();
                        return $this->render('JYGRevestimientosBundle:Venta:index.html.twig', array(
                            'entities' => $entities));
                    }else{            
                        $this->addFlash('error','Debe elegir un producto para la venta');
                    }
                    
                }// fin else se puedo vender
                    
            }else{    
                $this->addFlash('error','Ha ocurrido un inconveniente al procesar los datos, por favor, verifique la información.');
            }//if is valid
        }//if del post request
        
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();

        $form = $this->createCreateForm($entity);
        return $this->render('JYGRevestimientosBundle:Venta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'clientes' => $clientes,
        ));
    }

    /**
     * Creates a form to create a Venta entity.
     *
     * @param Venta $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Venta $entity)
    {
        $form = $this->createForm(new VentaType(), $entity, array(
            'action' => $this->generateUrl('venta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Registrar la Venta',
            'attr' => array('class' => 'btn btn-block btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new Venta entity.
     *
     */
    public function newAction()
    {
        $entity = new Venta();
        $form   = $this->createCreateForm($entity);

        /*Los Clientes para que pueda elegir al que está comprando */
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();

        return $this->render('JYGRevestimientosBundle:Venta:new.html.twig', array(
            'entity' => $entity,
            'clientes' => $clientes,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Venta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $venta = $em->getRepository('JYGRevestimientosBundle:Venta')->find($id);
        $items = $em->getRepository('JYGRevestimientosBundle:Item')->findNumVenta($id);
        $cliente = $em->getRepository('JYGRevestimientosBundle:Cliente')->find($venta->getComprador());


        if (!$venta) {
            throw $this->createNotFoundException('Unable to find Venta venta.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Venta:show.html.twig', array(
            'entity'      => $venta,
            'cliente'     => $cliente,
            'items'       => $items,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Venta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Venta entity.');
        }
        
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Venta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Venta entity.
    *
    * @param Venta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Venta $entity)
    {
        $form = $this->createForm(new VentaType(), $entity, array(
            'action' => $this->generateUrl('venta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Actualizar Datos de la Venta',
            'attr' => array('class'=>'btn btn-block btn-primary')));

        return $form;
    }
    /**
     * Edits an existing Venta entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Venta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('venta_edit', array('id' => $id)));
        }

        return $this->render('JYGRevestimientosBundle:Venta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function contar_hasta($caracter, $cad_aux){
        $a = 0;
        $j = strlen($cad_aux);
        
        while ($j > 0) {
            $j = $j-1;
            if ($cad_aux[$j] != $caracter) {
               $a = $a-1;
            }else{
               $j = 0; 
           }
        }
        return $a;
    }

    /**
     * Deletes a Venta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $session = $request->getSession();
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JYGRevestimientosBundle:Venta')->find($id);

            if (!$entity) {    
                $this->addFlash('error','La venta que desea eliminar no existe.');
                return $this->redirect($this->generateUrl('venta'));
            }else{
                //Aqui incremento los productos que se están eliminando, extrayendo la información de los items
                //Operaciones respecto a los items de la venta
                $item = $entity->getItems();
                $hasta = $item->count();

                for ($i=0; $i<$hasta; $i++){ //Para cada producto de la venta
                    $material = $item[$i]->getCodigomaterial();//El producto que compró (una instancia de material)
                    $almacenes = $material->getAlmacenes(); //almacenes con las cantidades actuales del producto

                    $cadena_raw = $item[$i]->getDescripcionmaterial();
                    /*$wordlist = array("Depósito Tienda=", "Depósito Origen=");
                    foreach ($wordlist as &$word){ $word = '/\b' . preg_quote($word, '/') . '\b/'; }
                    $cadena_raw = preg_replace($wordlist, '', $cadena_raw);*/
                    
                    $a = $this->contar_hasta(',', $cadena_raw);
                    
                    //Substraigo desde la primera coma de atras hacia delante hasta el final de la cadena
                    $datos_alm = substr($cadena_raw, $a); //Depósito Tienda=70 y Depósito Origen=10
                    
                    //Cantidad de depositos de donde se extrajo el producto para la venta
                    $cant_depositos_venta = substr_count($datos_alm, "Depósito"); 

                    //las posibilidades son 1 o 2 (que son los depositos de donde se puede comprar)
                    if($cant_depositos_venta == 1){
                        $a = $this->contar_hasta('=', $datos_alm);
                        $cant_material = substr($datos_alm, $a);
                        $nombre_dep = substr($datos_alm, 1, $a-1);

                        for ($j=0; $j<$cant_depositos_venta; $j++) { 
                            if ($almacenes[$j]->getNombrealmacen() == $nombre_dep) {
                                $almacenes[$j]->setCantmaterialdisponible($almacenes[$j]->getCantmaterialdisponible()+$cant_material);
                                //throw $this->createNotFoundException($almacenes[$j]->getNombrealmacen().$nombre_dep);
                            }
                        }
                    }else{

                        $a = $this->contar_hasta('y', $datos_alm);

                        $primera_cad = substr($datos_alm, $a);
                        $segunda_cad = substr($datos_alm, 1, $a-1);

                        $a = $this->contar_hasta('=', $primera_cad);
                        $cant_material = substr($primera_cad, $a);
                        $nombre_dep = substr($primera_cad, 1, $a-1);
                        
                        for ($j=0; $j<$cant_depositos_venta; $j++) { 
                            if ($almacenes[$j]->getNombrealmacen() == $nombre_dep) {
                                $almacenes[$j]->setCantmaterialdisponible($almacenes[$j]->getCantmaterialdisponible()+$cant_material);
                            }
                        }

                        $a = $this->contar_hasta('=', $segunda_cad);
                        $cant_material = substr($segunda_cad, $a);
                        $nombre_dep = substr($segunda_cad, 0, $a-1);

                        for ($j=0; $j<$cant_depositos_venta; $j++) { 
                            if ($almacenes[$j]->getNombrealmacen() == $nombre_dep) {
                                $almacenes[$j]->setCantmaterialdisponible($almacenes[$j]->getCantmaterialdisponible()+$cant_material);
                            }
                        }
                    }
                }//End del form de los items
                $session->getFlashBag()->add('exito','Se ha eliminado la venta y se han restaurado las cantidades en los Depósitos.');
                $em->remove($entity);
                /*Entrada en la bitacora*/
                //$this->addLog($this->getUser()->getnombreUsuario(), 'Eliminó Venta de: '. $entity->getComprador()->getNombre());
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('venta'));
    }

    /**
     * Creates a form to delete a Venta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('venta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => 'Eliminar Venta',
                'attr' => array('class'=>'btn btn-danger btn-block')))
            ->getForm()
        ;
    }

    /*Funciones para guardar la bitácora:
    * Esta función agrega una nueva entrada a la tabla bitácora.
    */
    private function addLog($login, $operacion, $fecha )
    {
        /* Se obtiene la hora del evento:*/
        
        $time = new \DateTime();
        /*Se establece la zona horaria correctamente.*/
        $zone = $this->container->getParameter('time_zone');
        $time->setTimezone( new \DateTimeZone($zone));
        

        /*Se crea el objeto bitacora para almacenarlo posteriormente*/
        $bitacora = new Bitacora();
        $bitacora->setLogin( $login )
            ->setOperacion($operacion)
            ->setFecha( $time );

        $em = $this->getDoctrine()->getManager();
        $em->persist($bitacora);
        $em->flush();

        return $this;
    }
}
