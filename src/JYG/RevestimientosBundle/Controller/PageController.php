<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
        return array(
                // ...
            );    }

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
