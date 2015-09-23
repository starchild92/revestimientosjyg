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

    public function EditarImagenAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('JYGRevestimientosBundle:Galeria')->find($id);

        if ($entity) //existe la foto seleccionada
        {
            $em = $this->getDoctrine()->getManager();
            //$entity = $em->getRepository('JYGRevestimientosBundle:Galeria')->find($id);
            if ($request->getMethod() == "POST") 
            {     
                $form = $this->createForm(new GaleriaType(), $entity, array(
                    'action' => $this->generateUrl('_editar_imagen', array('id' => $id)),
                    'method' => 'POST',
                ));
                $form->add('guardar', 'submit', array(
                    'label' => 'Actualizar Datos de la Imágen',
                    'attr' => array('class' => 'btn btn-success btn-block')
                ));
                $form->handleRequest($request);
                /* handleRequest() writes the submitted data back into the properties of the $entity object.*/
                /*
                    isValid daba falso cuando se pasa al controlador 'actualizar_imagen' que ya no hace falta
                    el ciclo de editar una imagen involucra que ya este creada
                    1. busco esa imagen creada y la almaceno en entity
                    2. si vengo de hacer submit con action POST entonces creo el formulario que esta arriba y handleRequest hace su magia
                    3. si el formulario es valido 'isValid = true' entonces guardo en la bd y redirijo a '_administrar_galeria'
                    4. si no es valido 'isValid = false' redirijo a 'EditarImagen' con el formulario y lo que me pasaron en la entidad
                */
                if ($form->isValid()){
                      $em->persist($entity);
                      $em->flush();
                      $this->get('session')->getFlashBag()->set('cod', 'La imagen se ha modificado con éxito');
                      return $this->redirect($this->generateUrl('_administrar_galeria'));

                  }else{
                      //throw $this->createNotFoundException('WTF is valid');
                      return $this->render('JYGRevestimientosBundle:Galeria:EditarImagen.html.twig', array(
                        'form' => $form->createView(),
                        'entity' => $entity
                        ));
                  }
            } 
        }//no se encontro la foto 
        else
        {
          //throw $this->createNotFoundException('La foto no existe.');
          return $this->redirect($this->generateUrl('_administrar_galeria'));
        }

        $form = $this->createForm(new GaleriaType(), $entity, array(
            'action' => $this->generateUrl('_editar_imagen', array('id' => $id)),
            'method' => 'POST',
        ));
        $form->add('guardar', 'submit', array(
            'label' => 'Actualizar Datos de la Imágen',
            'attr' => array('class' => 'btn btn-success btn-block')
        ));

        return $this->render('JYGRevestimientosBundle:Galeria:EditarImagen.html.twig', array(
            'form' => $form->createView(),
            'entity' => $entity
        ));
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
            $this->get('session')->getFlashBag()->set('cod', 'La imagen fue eliminada correctamente.');
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
