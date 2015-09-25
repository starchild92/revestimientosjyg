<?php

namespace JYG\RevestimientosBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JYG\RevestimientosBundle\Entity\Bitacora;

/**
 * Bitacora controller.
 *
 */
class BitacoraController extends Controller
{

    /**
     * Lists all Bitacora entities.
     *
     */
    public function indexAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }

        $em  = $this->getDoctrine()->getManager()->createQuery('SELECT u FROM JYGRevestimientosBundle:Bitacora u 
                ORDER BY u.id DESC');
        $result = $em->getResult();
        return $this->render('JYGRevestimientosBundle:Bitacora:index.html.twig', array(
            'result' => $result,
        ));   
    }

    /**
     * Finds and displays a Bitacora entity.
     *
     */
    public function showAction($id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('login')){
            $this->addFlash('errorsesion','Debe iniciar sesión para acceder a esta sección.');
            return $this->redirect($this->generateUrl('_inicio_sesion'));
        }
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:Bitacora')->find($id);

        return $this->render('JYGRevestimientosBundle:Bitacora:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
