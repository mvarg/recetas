<?php

namespace RecipeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('difficulty', 'choice', [
                'choices' => ['Muy fácil', 'fácil', 'media', 'difícil', 'muy difícil'],
                'placeholder' => 'Seleccionar'
            ])
            ->add('portion')
            ->add('rate')
            ->add('duration')
            ->add('save', 'submit', ['label' => 'Guardar'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RecipeBundle\Entity\Recipe'
        ));
    }
}
