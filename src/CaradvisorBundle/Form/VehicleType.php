<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Marque']
            ])
            ->add('model', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Modéle']
            ])
            ->add('version', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Vérsion']
            ])
            ->add('kilometers',IntegerType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Kilométrage']
            ])
            ->add('registration',TextType::class,[
                'label' => false,
                'attr' => ['placeholder' => 'Immatriculation']
            ])
            ->add('year',IntegerType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Année']
            ])
            ->add('energy',TextType::class,[
                'label' => false,
                'attr' => ['placeholder' => 'Enérgie']
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Vehicle::class,
        ));

    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_vehicle_type';
    }
}
