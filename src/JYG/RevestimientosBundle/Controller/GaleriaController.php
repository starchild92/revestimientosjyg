<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JYG\RevestimientosBundle\Entity\Galeria;
use JYG\RevestimientosBundle\Form\GaleriaType;

class GaleriaController extends Controller
{
    public function AdministrarGaleriaAction()
    {
        $galeria = new Galeria();
        $form = $this->createForm(new GaleriaType(), $galeria);
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();
        return $this->render('JYGRevestimientosBundle:Galeria:AdministrarGaleria.html.twig', array(
            'form' => $form->createView(),
            'entities' => $entities
        ));
    }

    public function NuevaImagenAction()
    {
        $galeria = new Galeria();
        $form = $this->createForm(new GaleriaType(), $galeria);   
        $request = $this->getRequest();
        
        
        if ($request->getMethod() == "POST") 
        {
            $form->handleRequest($request);
            if ($form->isValid()) 
            {   
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($galeria);
                    $em->flush();
                
                return $this->redirect($this->generateUrl('JYGRevestimientosBundle_galeria'));
            }
        }
            /*Para la imagenes que estan en galeria*/
            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();
            return $this->render('JYGRevestimientosBundle:Galeria:NuevaImagen.html.twig', array(
                'form' => $form->createView(),
                'entities' => $entities
            ));
    }

    public function EditarImagenAction()
    {
        return $this->render('JYGRevestimientosBundle:Galeria:EditarImagen.html.twig', array(
                // ...
            ));    }

    public function EliminarImagenAction()
    {
        return $this->render('JYGRevestimientosBundle:Galeria:EliminarImagen.html.twig', array(
                // ...
            ));    }

    public function MostrarGaleriaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();

        if (!$entities) {
            $this->get('session')->getFlashBag()->set('error', 'De momento no hay imágenes para mostrar en la galería.');
        }

        return $this->render('JYGRevestimientosBundle:Page:galeria.html.twig', array(
            'entities' => $entities,
        ));
    }

}
