<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MaterialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codigo')
            ->add('tipo','choice', array(
                    'choices'  => array('Selecciona'=>'Selecciona una','Laja Natural' => 'Laja Natural', 'Laja Formateada' => 'Laja Formateada','Quimicos' => 'Quimicos'),
                    'label'=>'Tipo de Producto'))
            ->add('formato','text',array('required' => false,'label'=>'Formato','disabled'=> true))
            ->add('tamano','text',array('required' => false,'label'=>'Tamaño','disabled'=> true))
            ->add('unidad','text',array('required' => false,'label'=>'Unidad','disabled'=> true))
            ->add('nombre')
            ->add('color','text',array('required' => false))
            ->add('preciocompra','text', array('label' => 'Precio de Compra'))
            ->add('precioventa', 'text', array('label' => 'Precio de Venta'))
            ->add('file', 'file', array(
                'required' => false,
                'label' => 'Archivo de Imagen'))
            ->add('venta', 'hidden')
            ->add('almacenes','collection',array(
                'type'=> new DepositoType(),
                'attr' => array('class' => 'tags'),
                'allow_add'=>'true',
                'by_reference'=>'false',
                'allow_delete' =>'true'
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Material'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_material';
    }
}
