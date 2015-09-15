<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GaleriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('path','hidden')
            ->add('file', 'file', array('label' => 'Archivo de Imagen'))
            ->add('nombre','text',array('required' => true, 'label' => 'Nombre de la Imagen'))
            ->add('descripcion','textarea',array('required' => false, 'label' => 'Descripción para la Imagen'));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Galeria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_galeria';
    }
}
