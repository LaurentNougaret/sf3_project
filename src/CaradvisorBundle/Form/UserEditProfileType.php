<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('roles')
            ->remove('plainpassword')
            ->remove('roles');

            /*
            ->add('plainpassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Confirmez le mot de passe']],
                'invalid_message' => 'Les mots de passe doivent être identiques',
            ]);

        $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($tagsAsArray) {
                    // transform the array to a string
                    return implode(', ', $tagsAsArray);
                },
                function ($tagsAsString) {
                    // transform the string back to an array
                    return explode(', ', $tagsAsString);
                }
            ));*/
    }

    public function getParent()
    {
        return UserType::class;
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_user_edit';
    }
}
