<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Venta;
use JYG\RevestimientosBundle\Form\VentaType;

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
        $entities = $em->getRepository('JYGRevestimientosBundle:Venta')->findAll();

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
                if (!$clienteaux) { //no existe el cliente
                    //Obtengo los datos del nuevo cliente
                    if($entity->getComprador()->getRif() == '' || $entity->getComprador()->getNombre() == '' || $entity->getComprador()->getDireccion() == '' || $entity->getComprador()->getTelefono()){
                        $session = $request->getSession();
                        $session->getFlashBag()->add('error','Debes elegir un usuario o agregar uno nuevo para poder realizar la venta.');
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
                //Guardando los items
                $item = $entity->getItems();
                $hasta = $item->count();
                for ($i=1; $i<=$hasta ; $i++) { 
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
                        //////////////////////////////////////////////////////
                        $item[$i]->setDescripcionmaterial($descripcion);
                        $session = $request->getSession();
                        $session->getFlashBag()->add('exito','El producto "'.$item[$i]->getDescripcionmaterial().'" si se puede vender, hay la cantidad suficiente.');
                    }else{
                        //No se puede vender
                        $se_puede_vender = false;
                        $session = $request->getSession();
                        $session->getFlashBag()->add('error','El producto "'.$item[$i]->getDescripcionmaterial().'" no se puede vender, no hay suficiente cantidad para realizar la venta');
                    }//se puedo vender
                }//End for

                if(!$se_puede_vender){
                    $em = $this->getDoctrine()->getManager();
                    $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();

                    return $this->render('JYGRevestimientosBundle:Venta:new.html.twig', array(
                        'entity' => $entity,
                        'form'   => $form->createView(),
                        'clientes' => $clientes,
                        ));
                }else{
                    if ($hasta > 0) {
                        $entity->setItems($item);
                        $em->persist($entity);
                        $em->flush();
                        
                        //compro bien
                        $session = $request->getSession();
                        $this->addFlash('exito','La venta se ha realizado con éxito');

                        $entities = $em->getRepository('JYGRevestimientosBundle:Venta')->findAll();
                        return $this->render('JYGRevestimientosBundle:Venta:index.html.twig', array(
                            'entities' => $entities));
                    }else{
                        $session = $request->getSession();
                        $this->addFlash('error','Debe elegir un producto para la venta');
                    }
                    
                }// fin else se puedo vender
                    
            }//if is valid
        }//if del post request
        
        $em = $this->getDoctrine()->getManager();
        $clientes = $em->getRepository('JYGRevestimientosBundle:Cliente')->findAll();

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

        $form->add('submit', 'submit', array('label' => 'Actualizar Datos de la Venta'));

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
    /**
     * Deletes a Venta entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JYGRevestimientosBundle:Venta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Venta entity.');
            }

            $em->remove($entity);
            $em->flush();
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
}
