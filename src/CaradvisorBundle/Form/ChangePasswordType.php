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
            ->add('plainpassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Confirmez le mot de passe']],
                'invalid_message' => 'Les mots de passe doivent être identiques',
            ])
            ->add('save', SubmitType::class, ['label' => false, 'attr' => [
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
