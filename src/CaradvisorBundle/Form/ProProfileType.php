<?php

namespace CaradvisorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('siret', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Numéro Siret']])
            ->add('dealerName', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Nom Prestataire']])
            ->add('dealertype', ChoiceType::class, ['label' => false,
                'choices' => [
                'Concessionnaire' => 'Concessionnaire',
                'Garagiste' => 'Garagiste',
                'Agent' => 'Agent',
                'Carrosserie' => 'Carrosserie',
                'Autre' => 'Autre'],
                'attr' => ['placeholder' => 'Type Prestataire']])
            ->add('email', EmailType::class, ['label' => false,
                'attr' => ['placeholder' => 'Email']])
            ->add('address', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Adresse']])
            ->add('city', TextType::class,['label' => false,
                'attr' => [ 'placeholder' => 'Ville']])
            ->add('postalCode', TextType::class, ['label' => false,
                'attr' => [ 'placeholder' => 'Code postal']])
            ->add('phone', TextType::class, ['label' => false,
                'attr' => [ 'placeholder' => 'Téléphone fixe']])
            ->add('brand', TextType::class, ['label' => false,
                'attr' => ['placeholder' => 'Marque']])
            ->add('description', TextareaType::class, ['label' => false,
                 'attr' => ['rows' => '6', 'placeholder' => 'Ajoutez une description de votre établissement', 'style' => 'resize = none']])
            ->add('save', SubmitType::class, ['label' => 'Modifier', 'attr' =>['class' => 'save-pro-btn center-block']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CaradvisorBundle\Entity\Pro',
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_pro_profile_type';
    }
}
