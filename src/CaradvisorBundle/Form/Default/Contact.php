<?php

namespace CaradvisorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Contact extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, ['placeholder' => 'Nom'])
            ->add('firstname', TextType::class, ['placeholder' => 'Prénom'])
            ->add('email', EmailType::class, ['placeholder' => 'Email'])
            ->add('subject', TextType::class, ['placeholder' => 'Objet de votre message'])
            ->add('message', TextareaType::class, [
                'placeholder' => 'Laissez votre message',
                'attr' => ['rows' => '5']
            ])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_contact';
    }
}
