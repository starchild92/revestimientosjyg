<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\Common\Collection\ArrayCollection;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JYG\RevestimientosBundle\Entity\Consulta;
use JYG\RevestimientosBundle\Entity\Login;
use JYG\RevestimientosBundle\Entity\Usuario;
use JYG\RevestimientosBundle\Form\LoginType;
use JYG\RevestimientosBundle\Form\UsuarioType;
use JYG\RevestimientosBundle\Form\ConsultaType;



class PageController extends Controller
{

    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {   
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:Material')->UltimosTresAgregados();
        
        return $this->render('JYGRevestimientosBundle:Page:index.html.twig', array(
            'entity'    =>  $entity,
        ));
    }

    /**
     * @Route("/productos")
     * @Template()
     */
    public function productosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerporAgregado();
        if (!$entities) {
            $this->get('session')->getFlashBag()->set('error', 'No hay productos para mostrar.');
        }
        $em    = $this->getDoctrine()->getManager();
        $dql   = "SELECT a FROM JYGRevestimientosBundle:Material a ORDER BY a.id DESC";
        $query = $em->createQuery($dql);
        if (!$query) {
            $this->get('session')->getFlashBag()->set('error', 'No hay productos para mostrar.');
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,9/*limit per page*/);


        return $this->render('JYGRevestimientosBundle:Page:productos.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    public function tipoAction($var)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator  = $this->get('knp_paginator');
        if($var === 'formateada'){
            $query = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerTipo('Laja Formateada');
            $pagination = $paginator->paginate(
                $query,
                $this->get('request')->query->get('page', 1)/*page number*/,9/*limit per page*/);
        }
        if($var === 'natural'){
            $query = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerTipo('Laja Natural');
            $pagination = $paginator->paginate(
                $query,
                $this->get('request')->query->get('page', 1)/*page number*/,9/*limit per page*/);
        }
        if($var === 'otro'){
            $query = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerOtroTipo();
            $pagination = $paginator->paginate(
                $query,
                $this->get('request')->query->get('page', 1)/*page number*/,9/*limit per page*/);
        }
        if (!$query) {
            $this->get('session')->getFlashBag()->set('error', 'No hay productos para mostrar.');
        }

        return $this->render('JYGRevestimientosBundle:Page:productos.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * @Route("/galeria")
     * @Template()
     */
    public function galeriaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();
        if (!$entities) {
            $this->get('session')->getFlashBag()->set('error', 'En estos momentos no hay imágenes en la galería, pero pronto estaremos añadiendo.');
        }
        return $this->render('JYGRevestimientosBundle:Page:galeria.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * @Route("/contacto")
     * @Template()
     */
    public function contactoAction(Request $request)
    {
        $consulta = new Consulta();
        $form = $this->createForm(new ConsultaType(), $consulta);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                // PREPARACIÓN DE EMAIL Y ENVIO
                $message = \Swift_Message::newInstance()
                    ->setSubject('Consulta en JYGRevestimientos.com.ve')
                    ->setFrom("edy992.6@gmail.com")
                    ->setTo($this->container->getParameter('JYG_Revestimientos.emails.contact_email'))
                    ->setContentType("text/html")
                    ->setBody($this->renderView('JYGRevestimientosBundle:Page:contactEmail.html.twig', array('consulta' => $consulta)));
                $this->get('mailer')->send($message);
               $this->addFlash('exito', 'Tu consulta ha sido enviada, Gracias!');
                return $this->redirect($this->generateUrl('JYGRevestimientosBundle_contacto'));
            }
        }

        return $this->render('JYGRevestimientosBundle:Page:contacto.html.twig', array(
            'form' => $form->createView()
        )); 
    }

    /**
     * @Route("/quienessomos")
     * @Template()
     */
    public function quienessomosAction()
    {
        return array(
                // ...
            );    }

    public function verProductoAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:Material')->find($id);

        if (!$entity) {
            return $this->showExceptionAction('El producto que ha solicitado no se encuentra');
        }

        return $this->render('JYGRevestimientosBundle:Page:verProducto.html.twig', array(
            'entity'      => $entity,
        ));
    }

    public function inicioAdminAction(Request $request){
        $session = $request->getSession();
        $login = $session->get('login');
        //$user = new UsuarioType();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('JYGRevestimientosBundle:Usuario')->findByUsername($login);
        if (sizeof($user) > 0) {
            $session->set('nombre',$user[0]->getNombre());
        }
        return $this->render('JYGRevestimientosBundle:Page:indexAdmin.html.twig');
    }

    /**
     * @Route("/iniciosesion")
     */
    public function inicioSesionAction(Request $request){

        $login = new Login();
        $form = $this->createForm(new LoginType(), $login);
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $login = $form->get('login')->getData();
                $password = md5($form->get('password')->getData());
                //throw $this->createNotFoundException($password);
                $em = $this->getDoctrine()->getManager();
                $user = $em->getRepository('JYGRevestimientosBundle:Login')
                            ->validarCuenta($login, $password);
               if ($user == null) {
                $this->get('session')->getFlashBag()->set('errorsesion', 'Lo sentimos, usted no está registrado');
                return $this->render('JYGRevestimientosBundle:Page:sesionini.html.twig', array(
                    'form' => $form->createView()
                    ));
                }else{
                    $session = new Session();
                    $session->set('login', $login);
                    $session->set('tipo_usuario', $user[0]->getCuenta());
                    return $this->inicioAdminAction($request);
                }
            }
        }
        return $this->render('JYGRevestimientosBundle:Page:sesionini.html.twig', array(
            'form' => $form->createView()
        )); 
    }

    public function cerrarSesionAction(){
        $session = $this->getRequest()->getSession();
        $session->remove('login');
        $session->remove('tipo_usuario');
        $session->remove('nombre');
        
        return $this->redirect($this->generateUrl('_inicio_sesion'));
    }

    public function pageNotFoundAction()
    {
        return $this->redirect($this->generateUrl('JYGRevestimientosBundle_inicio'));
    }

    public function showExceptionAction($mensaje = ':('){
        return $this->render('TwigBundle:Exception:error.html.twig', array('mensaje' => $mensaje));
    }

}
