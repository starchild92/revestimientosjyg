<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemCompraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigomaterial',null, array('label' => 'Codigo del Material','data_class' => null))
            ->add('deposito','choice', array(
                    'choices'  => array('Depósito Tienda' => 'Depósito Tienda', 'Depósito Origen' => 'Depósito Origen'),
                    'label'=>'Nombre del Depósito'))
            ->add('cantidad','text', array('label' => 'Cantidad de Material'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\ItemCompra'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_itemcompra';
    }
}
