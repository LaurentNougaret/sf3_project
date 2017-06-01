<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Answer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, [
               'label' => false,
                'attr' => [
                    'rows' => '6',
                    'style' => 'resize:none',
                    'placeholder' => 'Répondre à cet avis'
                    ]]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Answer::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_answer_type';
    }
}
