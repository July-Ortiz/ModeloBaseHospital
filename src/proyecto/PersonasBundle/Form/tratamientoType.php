<?php

namespace proyecto\PersonasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class tratamientoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medico')
            ->add('fecha')
            ->add('ambulatorio')
            ->add('observaciones')
            ->add('especialidad')
            ->add('paciente_id')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'proyecto\PersonasBundle\Entity\tratamiento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_personasbundle_tratamiento';
    }
}
