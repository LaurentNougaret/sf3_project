<?php

namespace CaradvisorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userType', ChoiceType::class, [
                'label' => false,
                'choices' => ['Particulier' => 'Particulier', 'Professionnel' => 'Professionnel'],
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom d\'utilisateur']
            ])

            ->add('firstname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom'],
            ])
            ->add('birthdate', DateType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Date de naissance']
            ])
            ->add('gender', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Homme'        => 'Homme',
                    'Femme'        => 'Femme',
                    'Autre'        => 'Autre',
                    'Non Précisé'  => 'Non Précisé',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Email'],
            ])
            ->add('phone', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Numéro de téléphone']
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
            ]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CaradvisorBundle\Entity\User',
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_user_edit';
    }
}
