<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array('label' => 'Nombre del Usuario'))
            ->add('apellido', 'text', array('label' => 'Apellido del Usuario'))
            ->add('telefono', 'text', array('label' => 'Télefono del Usuario'))
            ->add('correo', 'text', array('label' => 'Correo Electronico del Usuario'))
            ->add('login', 'text', array('label' => 'Login del Usuario'))
            ->add('contrasena', 'password', array('label' => 'Contraseña'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_usuario';
    }
}
