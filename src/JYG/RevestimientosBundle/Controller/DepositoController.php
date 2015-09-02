<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Deposito;
use JYG\RevestimientosBundle\Form\DepositoType;

/**
 * Deposito controller.
 *
 */
class DepositoController extends Controller
{

    /**
     * Lists all Deposito entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JYGRevestimientosBundle:Deposito')->findAll();

        return $this->render('JYGRevestimientosBundle:Deposito:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Deposito entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Deposito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('deposito_show', array('id' => $entity->getId())));
        }

        return $this->render('JYGRevestimientosBundle:Deposito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Deposito entity.
     *
     * @param Deposito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Deposito $entity)
    {
        $form = $this->createForm(new DepositoType(), $entity, array(
            'action' => $this->generateUrl('deposito_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Deposito entity.
     *
     */
    public function newAction()
    {
        $entity = new Deposito();
        $form   = $this->createCreateForm($entity);

        return $this->render('JYGRevestimientosBundle:Deposito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Deposito entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Deposito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Deposito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Deposito:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Deposito entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Deposito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Deposito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Deposito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Deposito entity.
    *
    * @param Deposito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Deposito $entity)
    {
        $form = $this->createForm(new DepositoType(), $entity, array(
            'action' => $this->generateUrl('deposito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Deposito entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Deposito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Deposito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('deposito_edit', array('id' => $id)));
        }

        return $this->render('JYGRevestimientosBundle:Deposito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Deposito entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JYGRevestimientosBundle:Deposito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Deposito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('deposito'));
    }

    /**
     * Creates a form to delete a Deposito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deposito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
