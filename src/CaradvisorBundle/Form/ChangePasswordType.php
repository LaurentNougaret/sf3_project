<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', PasswordType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Entrez votre nouveau mot de passe']])
            ->add('passwordCompare', PasswordType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Confirmez le mot de passe', 'mapped' => false]])
            ->add('submit', SubmitType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Réinitialiser', 'class' => 'btn btn-primary btn-lg btn-block btn-conn btn-pass']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_change_password_type';
    }
}
