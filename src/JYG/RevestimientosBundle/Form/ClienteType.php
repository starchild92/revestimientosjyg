<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rif', 'text', array('label' => 'Registro de Identificación Fiscal o Cédula de Identidad'))
            ->add('nombre', 'text', array('label' => 'Nombre del Cliente'))
            ->add('direccion', 'textarea', array('label' => 'Dirección del Cliente'))
            ->add('telefono', 'text', array('label' => 'Teléfono del Cliente'))
            ->add('compras','hidden',array('mapped'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_cliente';
    }
}
