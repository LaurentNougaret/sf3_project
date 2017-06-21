<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\UserProfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('birthdate', BirthdayType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => ['placeholder' => 'Date de naissance']
                ])
                ->add('phone', NumberType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => ['placeholder' => 'Numéro de téléphone']
                ])
                ->add('address', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => ['placeholder' => 'Adresse']
                ])
                ->add('city', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => ['placeholder' => 'Ville']
                ])
                ->add('postalCode', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => ['placeholder' => 'Code Postal']
                ])

                ->add('picture', FileType::class, [
                    'label' => 'Modifiez votre avatar',
                    'attr' => ['style' => 'display:inline-block;']
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserProfile::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisorbundle_userprofile';
    }


}
