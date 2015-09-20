<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LoginType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', null, array('label' => false,'attr' => array('class' => 'form-control')))
            ->add('password', 'password', array('label' => false,'attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Login'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_login';
    }
}
