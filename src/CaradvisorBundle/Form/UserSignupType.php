<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSignupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Nom']
            ])

            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Prénom']
            ])
            ->add('userName', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Pseudo']
            ])
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('gender', ChoiceType::class, array(
                'label' =>false,
                'attr' => ['placeholder' => 'Sexe'],
                'choices' => array(
                    'Homme' => true,
                    'Femme' => true,
                    'Autre' => true,
                )))

            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Mot de passe']
            ])

            ->add('submit', SubmitType::class, ['label' => 'Envoyer']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));

    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_user_signup_type';
    }
}
