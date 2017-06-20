<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\ReviewRepair;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewRepairType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dealerType', ChoiceType::class, [
                'label' => 'Type de prestataire',
                'choices' => [
                    'Concessionnaire' => 'Concessionnaire',
                    'Garagiste' => 'Garagiste',
                    'Agent' => 'Agent',
                    'Carrossier' => 'Carrossier',
                    'Autre' => 'Autre'
                ]
            ])
            ->add('dealerName', TextType::class, [
                'label' => 'Nom',
                'attr'  => ['placeholder' => 'Nom de la société']
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code Postal',
            ])
            ->add('ratingGlobal', ChoiceType::class, [ //mettre un IntegerType::class au rating ?
                'label' => 'Note Globale',
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('subject', TextType::class, [
                'label' => 'Titre',
                'attr'  => ['placeholder' => 'Titre de votre avis']
            ])
            ->add('review', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'rows' => '7',
                    'style' => 'resize:none',
                    'placeholder' => 'Devrivez votre expérience',
                    ]
            ])
            ->add('dateRepair', DateType::class, [
                'label' => 'Date de l\'intervention',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder'   => 'jj-mm-aaaa',
                    'format'        => 'dd-MM-yyyy',
                ],
            ])
            ->add('ratingWelcome', ChoiceType::class, [
                'label' => 'Quel type d\'accueil avez-vous eu ?',
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('typeRepair', TextType::class, [
                'label' => 'Pour quel type d\'intervention votre véhicule a été pris en charge ?',
                'attr'  => ['placeholder' => 'Changement de pneus, révision ...']
            ])
            ->add('appointmentDelay', IntegerType::class, [
                'label' => 'Temps d\'attente pour avoir un rendez-vous :',
            ])
            ->add('onSpotDelayRating', ChoiceType::class, [
                'label' => 'Délai de prise en charge de votre véhicule sur place :',
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('explanationRepair', ChoiceType::class, [
                'label' => 'Vous a-t-on bien expliqué le type d\'intervention que votre véhicule allait subir ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('priceRepair', ChoiceType::class, [
                'label' => 'Vous a-t-on bien communiqué le montant de l\'intervention ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('authorizationRepair', ChoiceType::class, [
                'label' => 'Vous a-t-on fait signer un document permettant l\'intervention ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('respectQuotationRepair', ChoiceType::class, [
                'label' => 'A-t-on bien respecté le devis ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('courtesyVehicle', ChoiceType::class, [
                'label' => 'Vous a-t-on proposé un véhicule de remplacement ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('respectDelayRepair', ChoiceType::class, [
                'label' => 'A-t-on bien respecté le délai de réparation ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
             ->add('conditionVehicleRating', ChoiceType::class, [
                'label' => 'Dans quel état votre véhicule a-t-il été restitué ?',
                 'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                 'required'=>true,
                 'expanded'=>true,
                 'multiple'=>false,
            ])
            ->add('recommendProRating', ChoiceType::class, [
                'label' => 'Dans quel mesure conseilleriez-vous votre professionnel ?',
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('advice', TextareaType::class, [
                'label' => 'Donnez un conseil à votre professionnel :',
                'attr' => [
                    'rows' => '5',
                    'style' => 'resize: none',
                    'placeholder' => 'Comment peut-il s\'améliorer ?',
                ]
            ])
            ->add('attachedFile', FileType::class, [
                'label' => 'Justificatif d\'expérience',
                'attr' => ['style' => 'display:inline-block;']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ReviewRepair::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_review_repair_type';
    }
}
