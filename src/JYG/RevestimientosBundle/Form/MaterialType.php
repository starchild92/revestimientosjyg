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
        /*Los valores del atributo 'tipo' están comprometidos con el JS de 'campomaterial'*/
        $builder
            ->add('codigo', 'text', array('label' => 'Código del Producto'))
            ->add('tipo','choice', array(
                    'choices'  => array('Selecciona'=>'Selecciona un tipo','Laja Natural' => 'Laja Natural', 'Laja Formateada' => 'Laja Formateada','Quimicos' => 'Quimicos'),
                    'label'=>'Tipo de Producto'))
            ->add('formato','text',array('required' => false,'label'=>'Formato (Ej. 2x2 ó 2cm x 4cm)'))
            ->add('tamano','text',array('required' => false,'label'=>'Tamaño (Ej. Grande, Mediano, Pequeño)'))
            ->add('unidad','text',array('required' => false,'label'=>'Unidad (en litros por unidad)'))
            ->add('nombre', 'text', array('label' => 'Nombre del Producto'))
            ->add('color','text',array('required' => false, 'label' => 'Color del Producto'))
            ->add('preciocompra','text', array('label' => 'Precio de Compra'))
            ->add('precioventa', 'text', array('label' => 'Precio de Venta'))
            ->add('file', 'file', array('required' => false,'label' => 'Archivo de Imagen del Prodcuto'))
            ->add('venta', 'hidden')
            ->add('almacenes','collection',array(
                'type'=> new DepositoType(),
                'attr' => array('class' => 'tags'),
                'allow_add'=>'true',
                'by_reference'=>'false',
                'allow_delete' =>'true',
                'label' => 'Almácenes donde se encuentra el producto'
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
