<?php

namespace CaradvisorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Votre nom']])
            ->add('firstname', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Votre prénom', ]])
            ->add('email', EmailType::class, ['label' => false,
                'attr' => ['placeholder' => 'Votre email']])
            ->add('subject', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Sujet de votre message']])
            ->add('message', TextareaType::class, ['label' => false,
                'attr' => ['rows' => '5', 'placeholder' => 'Votre message']])
            ->add('save', SubmitType::class, ['label' => 'Envoyer']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CaradvisorBundle\Entity\Contact',
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_contact_type';
    }
}
