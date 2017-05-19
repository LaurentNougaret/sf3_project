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
            ->add('lastname', TextType::class, ['empty_data' => 'Nom'])
            ->add('firstname', TextType::class, ['empty_data' => 'Prénom'])
            ->add('email', EmailType::class, ['empty_data' => 'Email'])
            ->add('subject', TextType::class, ['empty_data' => 'Objet de votre message'])
            ->add('message', TextareaType::class, [
                'empty_data' => 'Laissez votre message',
                'attr' => ['rows' => '5', 'placeholder' => 'Votre message', 'label' => false]
            ])
            ->add('save', SubmitType::class, ['label' => 'Envoyer']);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
       // $resolver->setDefaults(array(
        //    'data_class' => 'CaradvisorBundle\Entity\Contact',
      //  ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_contact';
    }
}
