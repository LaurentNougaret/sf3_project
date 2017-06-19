<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Model\ChangePassword;
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
            ->add('oldPassword', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr'  => ['placeholder' => 'Entrez votre mot de passe actuel'],
                'invalid_message' => 'Le mot de passe saisi ne correspond au mot de passe actuel'
            ])
            ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'first_options' => [
                'label' => false,
                'attr' => ['placeholder' => 'Entrez votre nouveau mot de passe']],
            'second_options' => [
                'label' => false,
                'attr' => ['placeholder' => 'Confirmez le mot de passe']],
            'invalid_message' => 'Les mots de passe doivent être identiques',
            ])
            ->add('save', SubmitType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Enregistrer', 'class' => 'passwordButton center-block']]);

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
