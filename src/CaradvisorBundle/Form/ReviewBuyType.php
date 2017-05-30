<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\ReviewBuy;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewBuyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('repairBuyType',ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Achat' => '1',
                    "Neuf"  => '2'
                ]
            ])
            ->add('dealerType', ChoiceType::class, [
                'label' => 'Type de prestataire',
                'choices' => [
                    'Concessionnaire' => '1',
                    'Garagiste' => '2',
                    'Agent' => '3',
                    'Carrossier' => '4',
                    'Autre' => '5'
                ]
            ])
            ->add('dealerName', IntegerType::class, [
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
            ->add('dateBuy', DateType::class, [
                'label' => 'Date de l\'achat',
                'widget' => 'single_text',
                // do not render as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // add a class that can be selected in JavaScript
                'attr' => [
                    'class' => 'js-datepicker',
                    'placeholder' => 'jj-mm-aaaa',
                ],
            ])
            ->add('ratingWelcome', ChoiceType::class, [
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('informationDelayRating',ChoiceType::class, [
                'label' => 'Délai pour avoir un renseignement sur le véhicule : ',
                'choices' => ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('wantedInformation', IntegerType::class, [
                'label' => 'Avez-vous eu les renseignements souhaités ?',
            ])
            ->add('test', IntegerType::class, [
                'label' => 'Vous a-t-on proposé un essai ?',
            ])
            ->add('wantedEngineTest', IntegerType::class, [
                'label' => 'L\'essai était-il sur le véhicule souhaité (motorisation ?',
            ])
            ->add('fundingSolution', IntegerType::class, [
                'label' => 'Vous a-t-on proposé une solution de financement ?',
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
            'data_class' => ReviewBuy::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_review_repair_type';
    }
}