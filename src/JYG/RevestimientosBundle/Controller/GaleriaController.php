<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JYG\RevestimientosBundle\Entity\Galeria;
use JYG\RevestimientosBundle\Form\GaleriaType;
use Symfony\Component\HttpFoundation\Request;


class GaleriaController extends Controller
{
    public function AdministrarGaleriaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();
        return $this->render('JYGRevestimientosBundle:Galeria:AdministrarGaleria.html.twig', array(
            'entities' => $entities
        ));
    }

    public function NuevaImagenAction()
    {
        $galeria = new Galeria();
        $form = $this->createForm(new GaleriaType(), $galeria);   
        $request = $this->getRequest();
        
        $form->add('guardar','submit', array(
                'label' => 'Agregar Imagen a la Galería',
                'attr' => array('class' => 'btn btn-primary btn-block')
            ));

        if ($request->getMethod() == "POST") 
        {
            $form->handleRequest($request);
            if ($form->isValid()) 
            {   
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($galeria);
                    $em->flush();
                
                return $this->redirect($this->generateUrl('_nueva_imagen'));
            }
        }
            /*Para ver la imagenes que están en galería*/
            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('JYGRevestimientosBundle:Galeria')->ObtenerporAgregado();
            return $this->render('JYGRevestimientosBundle:Galeria:NuevaImagen.html.twig', array(
                'form' => $form->createView(),
                'entities' => $entities
            ));
    }

    public function EditarImagenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:Galeria')->find($id);

        $form = $this->createForm(new GaleriaType(), $entity, array(
            'action' => $this->generateUrl('_actualizar_imagen_galeria', array('id' => $id)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array(
            'label' => 'Actualizar Datos de la Imágen',
            'attr' => array('class' => 'btn btn-success btn-block')
            ));
        return $this->render('JYGRevestimientosBundle:Galeria:EditarImagen.html.twig', array(
            'entity'      => $entity,
            'form'        => $form->createView(),
        ));
    }

    public function ActualizarImagenAction(Request $request, $id)
    {
          if ($request->getMethod() == "POST") 
          {
            $em = $this->getDoctrine()->getManager();
            $foto = $em->getRepository('JYGRevestimientosBundle:Galeria')->find($id);
            if ($foto) //existe la foto seleccionada
            {     
                  $form = $this->createForm(new GaleriaType(), $foto);
                  $form->handleRequest($request);
                  if ($form->isValid()) 
                  {
                      $em->persist($foto);
                      $em->flush();
                      return $this->redirect($this->generateUrl('_administrar_geleria'));
                  }
            } //no se encontro la foto 
            else
            {
              throw $this->createNotFoundException('La foto no existe.');
            }
          }

         return $this->redirect($this->generateUrl('JYGRevestimientosBundle_galeria'));
    }

    public function EliminarImagenAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $foto = $em->getRepository('JYGRevestimientosBundle:Galeria')->find($id);

        if(!$foto){
            $this->get('session')->getFlashBag()->set('error', 'La imágen que desea eliminar no existe.');
        }else{
            $em->remove($foto);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('_administrar_galeria'));
    }

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
