<?php

namespace JYG\RevestimientosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JYG\RevestimientosBundle\Entity\Archivo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ArchivoController extends Controller
{

	public function upload()
	{
	    // the file property can be empty if the field is not required
	    if (null === $this->getFile()) {
	        return;
	    }

	    // use the original file name here but you should
	    // sanitize it at least to avoid any security issues

	    // move takes the target directory and then the
	    // target filename to move to
	    $this->getFile()->move(
	        $this->getUploadRootDir(),
	        $this->getFile()->getClientOriginalName()
	    );

	    // set the path property to the filename where you've saved the file
	    $this->path = $this->getFile()->getClientOriginalName();

	    // clean up the file property as you won't need it anymore
	    $this->file = null;
	}
	
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
