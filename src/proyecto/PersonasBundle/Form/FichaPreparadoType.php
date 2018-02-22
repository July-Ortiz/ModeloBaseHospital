<?php

namespace proyecto\PersonasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FichaPreparadoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('droga')
            ->add('dosis')
            ->add('volumenFinal')
            ->add('solvente')
            ->add('diluyente')
            ->add('volumen')
            ->add('concentracion')
            ->add('tiempoInfusion')
            ->add('velocidadInfusion')
            ->add('estabilidadDilucion')
            ->add('conservacion')
            ->add('farmaceutico')
            ->add('controlFarmaceutico')
            ->add('tecnicoPreparacion')
            ->add('controlCalidad')
            ->add('observaciones')
            ->add('paciente_id')
            ->add('tratamiento_id')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'proyecto\PersonasBundle\Entity\FichaPreparado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'proyecto_personasbundle_fichapreparado';
    }
}
