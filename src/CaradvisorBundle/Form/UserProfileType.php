<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\UserProfile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address')
            ->add('city')
            ->add('postalCode')
            ->add('phone')
            ->add('birthDate');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => UserProfile::class
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisorbundle_userprofile';
    }


}
