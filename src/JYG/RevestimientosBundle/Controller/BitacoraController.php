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
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JYGRevestimientosBundle:Bitacora')->findAll();

        return $this->render('JYGRevestimientosBundle:Bitacora:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Bitacora entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JYGRevestimientosBundle:Bitacora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bitacora entity.');
        }

        return $this->render('JYGRevestimientosBundle:Bitacora:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
