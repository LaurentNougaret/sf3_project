<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgottenPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Entrez votre mail']])
            ->add('submit', SubmitType::class, ['label' => false, 'attr' => ['placeholder' => 'Réinitialiser', 'class' => 'passwordButton']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_user_type';
    }
}
