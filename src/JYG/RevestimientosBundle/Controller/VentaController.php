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
        if ($request->getMethod() == "POST") 
        {
            $form->handleRequest($request);
            if ($form->isValid()) 
            {
                /*$cliente_ = $entity->getComprador()->getNombre();
                $cliente_ = $cliente_.' '.$entity->getComprador()->getRif();
                $cliente_ = $cliente_.' '.$entity->getComprador()->getDireccion();
                $cliente_ = $cliente_.' '.$entity->getComprador()->getTelefono();

               // throw $this->createNotFoundException($cliente_);*/

                $em = $this->getDoctrine()->getManager();
                $clienteaux = $em->getRepository('JYGRevestimientosBundle:Venta')->BuscarPorRif($entity->getComprador()->getRif());
                if (!$clienteaux) { //no existe el cliente
                    //throw $this->createNotFoundException('No existe el cliente, hay que crearlo con los datos del formulario');
                    
                    //Obtengo los datos del nuevo cliente
                    $cliente->setRif($entity->getComprador()->getRif());
                    $cliente->setNombre($entity->getComprador()->getNombre());
                    $cliente->setDireccion($entity->getComprador()->getDireccion());
                    $cliente->setTelefono($entity->getComprador()->getTelefono());
                    
                    //Guardo al nuevo cliente la bd
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($cliente);
                    $em->flush();
                    //Guardando los items de la venta
                    $item = $entity->getItems();
                    $hasta = $item->count();
                    for ($i=1; $i<=$hasta ; $i++) { 
                        $item[$i]->setDescripcionmaterial($item[$i]->getCodigomaterial());
                    }
                    $entity->setItems($item);

                    $item = $entity->getItems();
                    $hasta = $item->count();
                    for ($i=1; $i<=$hasta ; $i++) { 
                        $item[$i]->setDescripcionmaterial($item[$i]->getCodigomaterial());
                    }
                    $entity->setItems($item);

                    //Colocandolo en la venta y luego guardando la venta
                    $entity->setComprador($cliente);
                    $em->persist($entity);
                    $em->flush();
                }else{
                
                    $item = $entity->getItems();
                    $hasta = $item->count();
                    for ($i=1; $i<=$hasta ; $i++) { 
                        $item[$i]->setDescripcionmaterial($item[$i]->getCodigomaterial());
                    }
                    $entity->setItems($item);

                    //Buscando el cliente que ya existe
                    $entity->setComprador($clienteaux[0]);
                    $em->persist($entity);
                    $em->flush();
                }
            }else{
                
            }
        }
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Venta')->findAll();

        return $this->render('JYGRevestimientosBundle:Venta:index.html.twig', array(
            'entities' => $entities,
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

        $form->add('submit', 'submit', array('label' => 'Update'));

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
