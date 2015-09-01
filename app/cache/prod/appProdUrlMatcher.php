<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // jyg_revestimientos_page_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'jyg_revestimientos_page_index');
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::indexAction',  '_route' => 'jyg_revestimientos_page_index',);
        }

        // jyg_revestimientos_page_productos
        if ($pathinfo === '/productos') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::productosAction',  '_route' => 'jyg_revestimientos_page_productos',);
        }

        // jyg_revestimientos_page_galeria
        if ($pathinfo === '/galeria') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::galeriaAction',  '_route' => 'jyg_revestimientos_page_galeria',);
        }

        // jyg_revestimientos_page_contacto
        if ($pathinfo === '/contacto') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::contactoAction',  '_route' => 'jyg_revestimientos_page_contacto',);
        }

        // jyg_revestimientos_page_ayuda
        if ($pathinfo === '/ayuda') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::ayudaAction',  '_route' => 'jyg_revestimientos_page_ayuda',);
        }

        // jyg_revestimientos_page_mision
        if ($pathinfo === '/mision') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::misionAction',  '_route' => 'jyg_revestimientos_page_mision',);
        }

        // jyg_revestimientos_page_vision
        if ($pathinfo === '/vision') {
            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::visionAction',  '_route' => 'jyg_revestimientos_page_vision',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // JYGRevestimientosBundle_inicio
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_inicio;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'JYGRevestimientosBundle_inicio');
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::indexAction',  '_route' => 'JYGRevestimientosBundle_inicio',);
        }
        not_JYGRevestimientosBundle_inicio:

        // JYGRevestimientosBundle_productos
        if ($pathinfo === '/productos') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_productos;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::productosAction',  '_route' => 'JYGRevestimientosBundle_productos',);
        }
        not_JYGRevestimientosBundle_productos:

        // JYGRevestimientosBundle_galeria
        if ($pathinfo === '/galeria') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_galeria;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::galeriaAction',  '_route' => 'JYGRevestimientosBundle_galeria',);
        }
        not_JYGRevestimientosBundle_galeria:

        // JYGRevestimientosBundle_contacto
        if ($pathinfo === '/contacto') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_contacto;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::contactoAction',  '_route' => 'JYGRevestimientosBundle_contacto',);
        }
        not_JYGRevestimientosBundle_contacto:

        // JYGRevestimientosBundle_ayuda
        if ($pathinfo === '/ayuda') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_ayuda;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::ayudaAction',  '_route' => 'JYGRevestimientosBundle_ayuda',);
        }
        not_JYGRevestimientosBundle_ayuda:

        // JYGRevestimientosBundle_mision
        if ($pathinfo === '/mision') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_mision;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::misionAction',  '_route' => 'JYGRevestimientosBundle_mision',);
        }
        not_JYGRevestimientosBundle_mision:

        // JYGRevestimientosBundle_vision
        if ($pathinfo === '/vision') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_JYGRevestimientosBundle_vision;
            }

            return array (  '_controller' => 'JYG\\RevestimientosBundle\\Controller\\PageController::visionAction',  '_route' => 'JYGRevestimientosBundle_vision',);
        }
        not_JYGRevestimientosBundle_vision:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
