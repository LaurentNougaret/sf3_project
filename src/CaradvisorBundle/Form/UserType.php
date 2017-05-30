<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom'],
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genre',
                'choices' => [
                    'Homme'        => 1,
                    'Femme'        => 2,
                    'Non Précisé'  => 3,
                    'Autre'        => 4,
                ]
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom d\'utilisateur']
            ])
            ->add('plainpassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Confirmez le mot de passe']],
                'invalid_message' => 'Les mots de passes doivent être identiques',
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Email'],
            ])
            ->add('address', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Adresse']
            ])
            ->add('city', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Ville']
            ])
            ->add('postalCode', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Code Postal']
            ])
            ->add('phone', IntegerType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Numéro de téléphone']
            ])
            ->add('birthdate', DateType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Date de naissance']
            ])
            ->add('userType', ChoiceType::class, [
                'label' => 'Vous êtes un ',
                'choices' => ['Particulier' => 1, 'Professionnel' => 2],
            ]);

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
