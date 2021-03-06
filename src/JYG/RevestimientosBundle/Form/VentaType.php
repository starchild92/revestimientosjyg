<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VentaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /* La fecha se coloca del servidor */
            ->add('fecha', 'datetime', array('label' => 'Fecha y Hora de la Compra'))
            ->add('comprador', new ClienteType(), array('cascade_validation' => true))
            ->add('items',
                    'collection',array(
                        'type'=> new ItemType(),
                        'cascade_validation' => true,
                        'attr' => array('class' => 'tags'),
                        'allow_add'=>'true',
                        'by_reference'=>'false',
                        'allow_delete' =>'true',
                        'data_class' => null,
                        'label' => 'Producto de la Venta'
                        )
            );
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Venta',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_venta';
    }
}
