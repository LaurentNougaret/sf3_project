<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, ['label' => 'Nom'])
            //->add('firstname', TextType::class, ['label' => 'Prénom'])
            //->add('email', EmailType::class, ['label' => 'Email'])
            //->add('subject', TextType::class, ['label' => 'Objet de votre message'])
            //->add('message', TextareaType::class, [
            //    'label' => 'Laissez votre message',
            //    'attr' => ['rows' => '5']
            //])
           ->add('submit', SubmitType::class, ['label' => 'Envoyer']);
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
