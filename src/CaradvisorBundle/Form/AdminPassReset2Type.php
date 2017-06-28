<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Admin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminPassReset2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('save', SubmitType::class, ['label' => false,
                'attr' => ['placeholder' => 'Réinitialiser', 'class' => 'passwordButton center-block']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Admin::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_admin_reset_type';
    }
}
