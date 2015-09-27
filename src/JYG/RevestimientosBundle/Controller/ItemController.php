<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Item;
use JYG\RevestimientosBundle\Form\ItemType;

/**
 * Item controller.
 *
 */
class ItemController extends Controller
{

    /**
     * Lists all Item entities.
     *
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Item')->AllOrdenById();
        return $this->render('JYGRevestimientosBundle:Item:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Item entity.
     *
     */
    public function createAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        $entity = new Item();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('item_show', array('id' => $entity->getId())));
        }

        return $this->render('JYGRevestimientosBundle:Item:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Item entity.
     *
     * @param Item $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Item $entity)
    {
        $form = $this->createForm(new ItemType(), $entity, array(
            'action' => $this->generateUrl('item_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Item entity.
     *
     */
    public function newAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        $entity = new Item();
        $form   = $this->createCreateForm($entity);

        return $this->render('JYGRevestimientosBundle:Item:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Item entity.
     *
     */
    public function showAction($id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Item:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Item entity.
     *
     */
    public function editAction($id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Item:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Item entity.
    *
    * @param Item $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Item $entity)
    {
        $form = $this->createForm(new ItemType(), $entity, array(
            'action' => $this->generateUrl('item_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Item entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        if($session->get('tipo_usuario') != 'Administrador'){
            $session->getFlashBag()->add('error','Su cuenta no posee permisos para realizar este tipo de accion.');
            return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
        }
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('item_edit', array('id' => $id)));
        }

        return $this->render('JYGRevestimientosBundle:Item:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Item entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $session = $this->getRequest()->getSession();
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
            $entity = $em->getRepository('JYGRevestimientosBundle:Item')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Item entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('item'));
    }

    /**
     * Creates a form to delete a Item entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
