<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\CompraMaterial;
use JYG\RevestimientosBundle\Form\CompraMaterialType;

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
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        
        $entity = new CompraMaterial();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
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
            'label' => 'Añadir Compra Material',
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

        $form->add('submit', 'submit', array('label' => 'Update'));

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

            return $this->redirect($this->generateUrl('compramaterial_edit', array('id' => $id)));
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
}
