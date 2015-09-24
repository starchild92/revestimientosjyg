<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JYG\RevestimientosBundle\Entity\Consulta;
use JYG\RevestimientosBundle\Entity\Login;
use JYG\RevestimientosBundle\Entity\Usuario;
use JYG\RevestimientosBundle\Form\LoginType;
use JYG\RevestimientosBundle\Form\UsuarioType;
use JYG\RevestimientosBundle\Form\ConsultaType;

use Symfony\Component\HttpFoundation\Session\Session;

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

        /*if (!$entity) {
            throw $this->createNotFoundException('Hay menos de 3 productos agregados');
        }*/

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

        return $this->render('JYGRevestimientosBundle:Page:productos.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function tipoAction($var)
    {
        $em = $this->getDoctrine()->getManager();
        if($var === 'formateada'){
            $entities = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerTipo('Laja Formateada');
        }
        if($var === 'natural'){
            $entities = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerTipo('Laja Natural');
        }
        if($var === 'quimicos'){
            $entities = $em->getRepository('JYGRevestimientosBundle:Material')->ObtenerTipo('Quimicos');
        }
        if (!$entities) {
            $this->get('session')->getFlashBag()->set('error', 'No hay productos para mostrar.');
        }

        return $this->render('JYGRevestimientosBundle:Page:productos.html.twig', array(
            'entities' => $entities,
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
    public function contactoAction()
    {
        $consulta = new Consulta();
        $form = $this->createForm(new ConsultaType(), $consulta);

        $request = $this->getRequest();
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
            throw $this->createNotFoundException('Este producto no se encuentra');
        }

        return $this->render('JYGRevestimientosBundle:Page:verProducto.html.twig', array(
            'entity'      => $entity,
        ));
    }

    public function inicioAdminAction(){
        $session = $this->getRequest()->getSession();
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
    public function inicioSesionAction(){

        $login = new Login();
        $form = $this->createForm(new LoginType(), $login);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $login = $form->get('login')->getData();
                $password = md5($form->get('password')->getData());

                $em = $this->getDoctrine()->getEntityManager();
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
                    //throw $this->createNotFoundException($login);
                    return $this->inicioAdminAction();
                }
            }
        }
        return $this->render('JYGRevestimientosBundle:Page:sesionini.html.twig', array(
            'form' => $form->createView()
        )); 
    }

    /**
     * @Route("/")
     */
    public function cerrarSesionAction(){
        $session = $this->getRequest()->getSession();
        $session->remove('login');
        return $this->indexAction();
    }

}
