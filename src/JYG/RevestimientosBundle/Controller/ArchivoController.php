<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JYG\RevestimientosBundle\Entity\Archivo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArchivoController extends Controller
{

	
	
	/**
 	 * @Template()
 	 */
    public function UploadAction()
    {
        $document = new Archivo();
	    $form = $this->createFormBuilder($document)
	        ->add('name')
	        ->add('file')
	        ->getForm()
	    ;

	    if ($this->getRequest()->isMethod('POST')) {
	        $form->bind($this->getRequest());
	        if ($form->isValid()) {
	            $em = $this->getDoctrine()->getManager();
				$document->upload();
	            $em->persist($document);
	            $em->flush();

	            return $this->redirect($this->generateUrl('JYGRevestimientosBundle_inicio'));
	        }
	    }

	    return array('form' => $form->createView());  
    }

    

}
