<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\Admin;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminPassReset1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Entrez votre e-mail']])
            ->add('submit', SubmitType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Réinitialiser',
                            'class' => 'passwordButton']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Admin::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_admin_reset_type';
    }
}
