<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgottenPassword extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Entrez votre identifiant']])
            ->add('submit', SubmitType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Réinitialiser']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
            ]);
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_forgotten_password';
    }
}
