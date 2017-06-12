<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\UserProfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('birthdate', DateType::class, [
                    'label' => false,
                    'attr' => ['placeholder' => 'Date de naissance']
                ])
                ->add('phone', IntegerType::class, [
                    'label' => false,
                    'attr' => ['placeholder' => 'Numéro de téléphone']
                ])
                ->add('address', TextType::class, [
                    'label' => false,
                    'attr' => ['placeholder' => 'Adresse']
                ])
                ->add('city', TextType::class, [
                    'label' => false,
                    'attr' => ['placeholder' => 'Ville']
                ])
                ->add('postalCode', TextType::class, [
                    'label' => false,
                    'attr' => ['placeholder' => 'Code Postal']
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Enregistrer', 'attr' => ['class' => 'save-pro-btn center-block']
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
