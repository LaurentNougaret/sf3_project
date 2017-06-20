<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plainPassword', PasswordType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Entrez votre mot de passe actuel']
            ])
            ->add('Password', RepeatedType::class, [
            'type' => PasswordType::class,
            'first_options' => [
                'label' => false,
                'attr' => ['placeholder' => 'Entrez votre nouveau mot de passe']],
            'second_options' => [
                'label' => false,
                'attr' => ['placeholder' => 'Confirmez le mot de passe']],
            'invalid_message' => 'Les mots de passe doivent être identiques',
            ])
            ->add('submit', SubmitType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Enregistrer']
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_change_password_type';
    }
}
