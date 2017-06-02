<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgottenPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName', TextType::class, ['label' => false, 'attr' => [
                'placeholder' => 'Entrez votre identifiant']])
            ->add('save', SubmitType::class, ['label' => 'Envoyer', 'attr' => [
                'class' => 'passwordButton']]);
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
