<?php

namespace proyecto\PersonasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class pacienteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni')
            ->add('fechaIngreso')
            ->add('peso')
            ->add('talla')
            ->add('NombreYApellido')
            ->add('ObraSocial')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'proyecto\PersonasBundle\Entity\paciente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_personasbundle_paciente';
    }
}
