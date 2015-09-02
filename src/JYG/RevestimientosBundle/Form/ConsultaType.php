<?php

namespace JYG\RevestimientosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class ConsultaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array('attr' => array('placeholder' => 'Quién eres?','pattern'     => '.{3,}',
                    'label' => false)))
            ->add('correo','email',array('attr' => array('placeholder' => 'Tú correo electronico.','label'=>false)))
            ->add('asunto', 'text', array('attr' => array('placeholder' => 'Asunto del mensaje.','pattern'=> '.{3,}','label'=>false)))
            ->add('mensaje', 'textarea', array('attr' => array('cols' => 68,'rows' => 6,'placeholder' => 'Tu mensaje aquí','label'=>false)))
            ->add('Enviar','submit')
            ->add('Cancelar','submit')
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JYG\RevestimientosBundle\Entity\Consulta',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'jyg_revestimientosbundle_consulta';
    }
}
