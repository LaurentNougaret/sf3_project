<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'label'     => false,
                'choices'   => ['Particulier' => 'ROLE_PART', 'Professionnel' => 'ROLE_PRO'],
                'multiple'  => false,
                'expanded'  => false,
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom d\'utilisateur']
            ])
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
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Prénom'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Nom'],
            ])
            ->add('gender', ChoiceType::class, [
                'label'     => false,
                'choices'   => [
                    'Homme'        => 'Homme',
                    'Femme'        => 'Femme',
                    'Autre'        => 'Autre',
                    'Non Précisé'  => 'Non Précisé',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => ['placeholder' => 'Email'],
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
            ));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_user_edit';
    }
}
