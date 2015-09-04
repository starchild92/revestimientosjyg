<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JYG\RevestimientosBundle\Entity\Consulta;
use JYG\RevestimientosBundle\Form\ConsultaType;

class PageController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/productos")
     * @Template()
     */
    public function productosAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/galeria")
     * @Template()
     */
    public function galeriaAction()
    {
        return array(
                // ...
            );    }

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
     * @Route("/ayuda")
     * @Template()
     */
    public function ayudaAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/mision")
     * @Template()
     */
    public function misionAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/vision")
     * @Template()
     */
    public function visionAction()
    {
        return array(
                // ...
            );    }

}
