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
    public function indexAction()
    {
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
        $entity = new CompraMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $items = $entity->getMaterial();

            //throw $this->createNotFoundException($cantItems = $items->count());

            $em->persist($entity);
            //el for va aqui
            $cantItems = $items->count();
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
    public function showAction($id)
    {
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
    public function editAction($id)
    {
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
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CompraMaterial entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {


            $em->flush();
            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Editada compra #:'. $entity->getId());
            $this->get('session')->getFlashBag()->set('cod', 'Compra Modificada con éxito');

            return $this->redirect($this->generateUrl('compramaterial_show', array('id' => $id)));
        }

        return $this->render('JYGRevestimientosBundle:CompraMaterial:edit.html.twig', array(
            'entity'      => $entity,
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
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JYGRevestimientosBundle:CompraMaterial')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CompraMaterial entity.');
            }

            $em->remove($entity);
             $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Eliminada compra #:'. $entity->getId());
            $this->get('session')->getFlashBag()->set('cod', 'Compra Eliminada con éxito');
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
            ->add('submit', 'submit', array('label' => 'Delete'))
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
