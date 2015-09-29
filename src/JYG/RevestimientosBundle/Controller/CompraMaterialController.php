<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\CompraMaterial;
use JYG\RevestimientosBundle\Entity\Deposito;
use JYG\RevestimientosBundle\Form\CompraMaterialType;
use JYG\RevestimientosBundle\Entity\Bitacora;

/**
 * CompraMaterial controller.
 *
 */
class CompraMaterialController extends Controller
{

    /**
     * Lists all CompraMaterial entities.
     *
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->findAll();
        return $this->render('JYGRevestimientosBundle:CompraMaterial:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CompraMaterial entity.
     *
     */
    public function createAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }

        $entity = new CompraMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $items = $entity->getMaterial();

            $em->persist($entity);
            $cantItems = $items->count();
            //throw $this->createNotFoundException($cantItems);
            if ($cantItems == 0) {
                $this->get('session')->getFlashBag()->set('cod', 'Al crear una compra debe añadir al menos un producto.');

            }else{
                for ($i=1; $i<=$cantItems; $i++) { 
                    $items[$i]->setCompra($entity); //agrego la id de la compra en el item :)

                    $cant_dep_origen = $items[$i]->getCantidad();
                    $nombre_dep_origen = $items[$i]->getDeposito();

                    $material = $items[$i]->getCodigomaterial();
                    $depositos_material = $material->getAlmacenes();

                    //throw $this->createNotFoundException(array_keys($depositos_material));
                    $lo_creo = true;
                    foreach ($depositos_material as &$depo) {
                        if ($depo->getNombrealmacen() == $nombre_dep_origen) { $lo_creo = false; }
                    }
                    if(!$lo_creo){
                        foreach ($depositos_material as &$depo) {
                            if ($depo->getNombrealmacen() == $nombre_dep_origen) {
                                $aux = $depo->getCantmaterialdisponible();
                                $aux = $aux + $cant_dep_origen;
                                $depo->setCantmaterialdisponible($aux);
                            }
                        }
                    }else{
                        $depo_nuevo = new Deposito();
                        $depo_nuevo->setNombrealmacen($nombre_dep_origen);
                        $depo_nuevo->setCantmaterialdisponible($cant_dep_origen);
                        $depo_nuevo->setMaterial($material);
                        $material->getAlmacenes()->add($depo_nuevo);
                    }
                }
                $session = $request->getSession();
                $login = $session->get('login');
                /*Entrada en la bitacora*/
                $this->addLog($login, 'Compra: #Factura'. $entity->getNrocontrolfactura());
                $this->get('session')->getFlashBag()->set('cod', 'Compra Registrada con éxito');
                $em->flush();

                return $this->redirect($this->generateUrl('compramaterial_show', array('id' => $entity->getId())));
            }
        }

        return $this->render('JYGRevestimientosBundle:CompraMaterial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CompraMaterial entity.
     *
     * @param CompraMaterial $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CompraMaterial $entity)
    {
        $form = $this->createForm(new CompraMaterialType(), $entity, array(
            'action' => $this->generateUrl('compramaterial_create'),
            'method' => 'POST',
        ));

       $form->add('submit', 'submit', array(
            'label' => 'Registrar Compra',
            'attr' => array('class' => 'btn btn-primary btn-block')
            ))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new CompraMaterial entity.
     *
     */
    public function newAction()
    {
        $entity = new CompraMaterial();
        $form   = $this->createCreateForm($entity);

        return $this->render('JYGRevestimientosBundle:CompraMaterial:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CompraMaterial entity.
     *
     */
    public function showAction(Request $request, $id)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompraMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:CompraMaterial:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CompraMaterial entity.
     *
     */
    public function editAction(Request $request, $id)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompraMaterial entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:CompraMaterial:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CompraMaterial entity.
    *
    * @param CompraMaterial $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CompraMaterial $entity)
    {
        $form = $this->createForm(new CompraMaterialType(), $entity, array(
            'action' => $this->generateUrl('compramaterial_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
            'label' => 'Actualizar Datos de la Compra',
            'attr' => array('class' => 'btn btn-success btn-block')
            ))
        ;

        return $form;
    }
    /**
     * Edits an existing CompraMaterial entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }

        $em = $this->getDoctrine()->getManager();
        $compra = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);

        $items_viejos = array();
        $items_viejos_copia = array();
        foreach ($compra->getMaterial() as $item) {
            $items_viejos[] = $item;
            $items_viejos_copia[] = $item;
        }

        if (!$compra) {
            throw $this->createNotFoundException('Unable to find CompraMaterial compra.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($compra);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            foreach ($compra->getMaterial() as $item_actual) { //los traigo del form
                foreach ($items_viejos as $key => $toDel) { // Me muevo por los items que se quedan
                    if ($toDel->getId() == $item_actual->getId()){
                        unset($items_viejos[$key]); //aqui quedan los items que se quitan
                    }
                }
            }

            foreach ($items_viejos as $item){
                //Para decrementar las cantidades de los depositos de los items que estoy quitando de la compra
                $material_viejo = $item->getCodigomaterial();
                $nombre_depo = $item->getDeposito();
                $cantidad_depo = $item->getCantidad();
                $depositos = $material_viejo->getAlmacenes();
                foreach ($depositos as $depo) {
                    if($depo->getNombrealmacen() == $nombre_depo){
                        $aux = $depo->getCantmaterialdisponible();
                        $aux = $aux - $cantidad_depo;
                        $depo->setCantmaterialdisponible($aux);
                    }
                }
                $em->persist($item);
                $em->remove($item);
            }

            $items_finales = $compra->getMaterial();
            //Aqui hago lo de agregar nuevos

            //Si entre los items nuevos hay alguno que no tiene almacenes
            foreach ($items_finales as $item) {
                $nombre_dep_origen = $item->getDeposito();
                $cant_dep_origen = $item->getCantidad();
                $material_n = $item->getCodigomaterial(); //material de items finales
                if (sizeof($material_n->getAlmacenes()) == 0) {
                    $depo_nuevo = new Deposito();
                    $depo_nuevo->setNombrealmacen($nombre_dep_origen);
                    $depo_nuevo->setCantmaterialdisponible($cant_dep_origen);
                    $depo_nuevo->setMaterial($material_n);
                    $material_n->getAlmacenes()->add($depo_nuevo);
                }
            }

            //Compra añade un alamcen en material que no existe
            foreach ($items_finales as $item) {
                $nombre_depo = $item->getDeposito();
                $cant_dep_origen = $item->getCantidad();
                $material = $item->getCodigomaterial(); //material de items finales
                $depositos = $material->getAlmacenes();
                if (sizeof($depositos) < 2) {
                    foreach ($depositos as $depo) {
                        if($depo->getNombrealmacen() != $nombre_depo){
                            $depo_nuevo = new Deposito();
                            $depo_nuevo->setNombrealmacen($nombre_dep_origen);
                            $depo_nuevo->setCantmaterialdisponible($cant_dep_origen);
                            $depo_nuevo->setMaterial($material_n);
                            $material_n->getAlmacenes()->add($depo_nuevo);
                        }
                    }
                }
            }

            //Caso, no modifico nada porque todo viene igual o algo asi
            foreach ($items_viejos_copia as $items_old) { //
                foreach ($items_finales as $item) {
                    $material_n = $item->getCodigomaterial(); //material de items finales
                    $material_v = $items_old->getCodigomaterial();
                    if ($material_n->getId() == $material_v->getId()){
                        $depo_n = $item->getDeposito();
                        $depo_v = $items_old->getDeposito();
                        if($depo_n == $depo_v){
                            $cant_n = $item->getCantidad();
                            $cant_v = $items_old->getCantidad();
                            if ($cant_n != $cant_v){
                                $material = $item->getCodigomaterial(); //tengo el material
                                $nombre_depo = $item->getDeposito();
                                $cantidad_depo = $item->getCantidad();
                                
                                //throw $this->createNotFoundException($cantidad_depo);
                                $depositos = $material->getAlmacenes();
                                foreach ($depositos as $depo) {
                                    if($depo->getNombrealmacen() == $nombre_depo){
                                        if ($cantidad_depo != $depo->getCantmaterialdisponible()) {
                                            $aux = $depo->getCantmaterialdisponible();
                                            $aux = $aux + $cantidad_depo;
                                            $depo->setCantmaterialdisponible($aux);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $compra->setMaterial($items_finales);
            $em->persist($compra);

            $em->flush();
            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Editada compra #'. $compra->getId());
            $this->get('session')->getFlashBag()->set('cod', 'Compra Modificada con éxito');

            return $this->redirect($this->generateUrl('compramaterial_show', array('id' => $id)));
        }//end_if

        return $this->render('JYGRevestimientosBundle:CompraMaterial:edit.html.twig', array(
            'entity'      => $compra,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CompraMaterial entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $session = $request->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $compra = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);

            $items = $compra->getMaterial();
            foreach ($items as $item_compra) {
                $material = $item_compra->getCodigomaterial();
                $nombre_depo = $item_compra->getDeposito();
                $cantidad_depo = $item_compra->getCantidad();
                $depositos = $material->getAlmacenes();
                foreach ($depositos as $depo) {
                    if($depo->getNombrealmacen() == $nombre_depo){
                        $aux = $depo->getCantmaterialdisponible();
                        $aux = $aux - $cantidad_depo;
                        $depo->setCantmaterialdisponible($aux);
                    }
                }
                //throw $this->createNotFoundException($material->getFormato());
            }
            $em->remove($compra);

            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Eliminada compra #'. $compra->getId());
            $this->get('session')->getFlashBag()->set('cod', 'Compra Eliminada con éxito, se repusieron las cantidades de los productos de la compra.');
            $em->flush();
        }

        return $this->redirect($this->generateUrl('compramaterial'));
    }

    /**
     * Creates a form to delete a CompraMaterial entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('compramaterial_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar Compra', 'attr'=>array('class'=>'btn btn-danger btn-block')))
            ->getForm()
        ;
    }

    /*Funciones para guardar la bitácora:
    * Esta función agrega una nueva entrada a la tabla bitácora.
    */
    private function addLog($login, $operacion )
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
