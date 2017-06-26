<?php

namespace CaradvisorBundle\Form;

use CaradvisorBundle\Entity\ReviewBuy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewBuyType extends AbstractType
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
                'attr'  => ['readonly' => 'readonly']
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code Postal',
                'attr'  => ['readonly' => 'readonly']
            ])
            ->add('ratingGlobal', ChoiceType::class, [ //mettre un IntegerType::class au rating ?
                'label' => 'Note Globale',
                'choices' => ['1', '2', '3', '4', '5'],
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
                    'placeholder' => 'Decrivez votre expérience',
                ]
            ])
            ->add('dateBuy', DateType::class, [
                'label' => 'Date de l\'intervention',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'jj-mm-aaaa',
                    'format' => 'dd-MM-yyyy',
                ],
            ])
            ->add('ratingWelcome', ChoiceType::class, [
                'label' => 'Quel type d\'accueil avez-vous eu ?',
                'choices' => ['1', '2', '3', '4', '5'],
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
            ->add('wantedInformation', ChoiceType::class, [
                'label' => 'Avez-vous eu les renseignements souhaités ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('test', ChoiceType::class, [
                'label' => 'Vous a-t-on proposé un essai ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('wantedEngineTest', ChoiceType::class, [
                'label' => 'L\'essai était-il sur le véhicule souhaité (motorisation, finition ...) ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('fundingSolution', ChoiceType::class, [
                'label' => 'Vous a-t-on proposé une solution de financement ?',
                'choices' => ['oui' => 1, 'non' => 2],
                'required'=>true,
                'expanded'=>true,
                'multiple'=>false,
            ])
            ->add('warranty', ChoiceType::class, [
                'label' => 'Vous a-t-on proposé une garantie ?',
                'choices' => ['oui' => 1, 'non' => 2],
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
            'data_class' => ReviewBuy::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'caradvisor_bundle_review_repair_type';
    }
}