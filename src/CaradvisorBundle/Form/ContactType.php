<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
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
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('subject', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Objet de votre message']
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'rows' => '5',
                    'style' => 'resize:none',
                    'placeholder' => 'Laissez votre message',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_contact';
    }
}
