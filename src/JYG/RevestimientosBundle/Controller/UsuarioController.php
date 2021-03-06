<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Usuario;
use JYG\RevestimientosBundle\Form\UsuarioType;
use JYG\RevestimientosBundle\Entity\Bitacora;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller
{

    /**
     * Lists all Usuario entities.
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
        $entities = $em->getRepository('JYGRevestimientosBundle:Usuario')->findAll();
        return $this->render('JYGRevestimientosBundle:Usuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Usuario entity.
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
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $plain = md5($entity->getPassword());
            $entity->setPassword($plain);
            $em->persist($entity);
            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Usuario'. $entity->getUsername().' Registrado');
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
        }

        return $this->render('JYGRevestimientosBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usuario $entity)
    {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Añadir nuevo usuario', 'attr' => array('class' => 'btn btn-success btn-block')));

        return $form;
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction(Request $request)
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
        $entity = new Usuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('JYGRevestimientosBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Usuario entity.
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

        $entity = $em->getRepository('JYGRevestimientosBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se encuenta el usuario.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Usuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Usuario entity.
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

        $entity = $em->getRepository('JYGRevestimientosBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('JYGRevestimientosBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Usuario entity.
    *
    * @param Usuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usuario $entity)
    {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar Usuario', 'attr' => array('class' => 'btn btn-success btn-block')));

        return $form;
    }
    /**
     * Edits an existing Usuario entity.
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

        $entity = $em->getRepository('JYGRevestimientosBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $plain = md5($entity->getPassword());
            $entity->setPassword($plain);
            
            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Datos del Usuario:'. $entity->getUsername().' Modificados');
            $em->flush();
            $this->get('session')->getFlashBag()->set('cod', 'Se ha actualizado la información del usuario de manera correcta');
            return $this->redirect($this->generateUrl('usuario_show', array('id' => $id)));
        }

        return $this->render('JYGRevestimientosBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Usuario entity.
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
            $entity = $em->getRepository('JYGRevestimientosBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }
            $session = $request->getSession();
            $login = $session->get('login');
            /*Entrada en la bitacora*/
            $this->addLog($login, 'Usuario'. $entity->getUsername().' Eliminado');
            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->set('cod', 'El usuario ha sido eliminado correctamente');
        }

        return $this->redirect($this->generateUrl('usuario'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar Usuario', 'attr' => array('class' => 'btn btn-danger btn-block')))
            ->getForm()
        ;
    }

    /*Funciones para guardar la bitácora:
    * Esta función agrega una nueva entrada a la tabla bitácora.
    */
    private function addLog($login, $operacion)
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
            ->setFecha($time);

        $em = $this->getDoctrine()->getManager();
        $em->persist($bitacora);
        $em->flush();

        return $this;
    }
}
