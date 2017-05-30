<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr'  => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr'  => ['placeholder' => 'Nom'],
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genre',
                'choices' => [
                    'Homme'        => 'Homme',
                    'Femme'        => 'Femme',
                    'Autre'        => 'Autre',
                    'Non Précisé'  => 'Non Précisé',
                ]
            ])
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur',
                'attr'  => ['placeholder' => 'Nom d\'utilisateur']
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'attr'  => ['placeholder' => 'Email'],
            ])
            ->add('address', TextType::class, [
                'label' => 'Addresse',
                'attr'  => ['placeholder' => 'Adresse']
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr'  => ['placeholder' => 'Ville']
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code Postal',
                'attr'  => ['placeholder' => 'Code Postal']
            ])
            ->add('phone', IntegerType::class, [
                'label' => 'Numéro de téléphone',
                'attr'  => ['placeholder' => 'Numéro de téléphone']
            ])
            ->add('birthdate', DateType::class, [
                'label' => 'Date de Naissance',
                'attr'  => ['placeholder' => 'Date de naissance']
            ])
            ->add('userType', ChoiceType::class, [
                'label' => 'Vous êtes un ',
                'choices' => ['Particulier' => 'Particulier', 'Professionnel' => 'Professionnel'],
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
