<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('typeMaison',TextType::class,array(
            // intitulé
            'label'=>'Type de maison : ',
            // css de l'intitulé
            'label_attr'=>array(
                'class'=>'lab30 red required',
            ),
            //champs
            'attr'=>array(
                'class'=>'',
            )
        ))
            ->add('typeUsage',TextType::class,array(
                'label'=>"Type d'usage :",
                'label_attr'=>array(
                    'class'=>'required'
                ),
            ))
            ->add('surface',TextType::class,array(
                'label'=>"Quelle surface habitable souhaitez-vous en m2 ? :",
                'label_attr'=>array(
                    'class'=>'required'
                ),
                'attr'=>array(
                    'class'=>'',
                )
            ))
            ->add('budget',TextType::class,array(
                'label'=>"Quel est votre budget ? ",
                'label_attr'=>array(
                    'class'=>'required'
                ),
                'attr'=>array(
                    'class'=>'',
                )
            ))
            ->add('etages',IntegerType::class,array(
                'label'=>"Combien d'étages souhaitez-vous ?",
                'label_attr'=>array(
                    'class'=>'required'
                ),
            ))
            ->add('chambres',IntegerType::class,array(
                'label'=>"Combien de chambres souhaitez-vous ?",
                'label_attr'=>array(
                    'class'=>'required'
                ),
            ))
            ->add('garage', ChoiceType::class, [
                'choices'  => [
                    'Oui' => true,
                    'Non' => false,
                ],
            ])
            ->add('exterieur', ChoiceType::class, [
                'choices'  => [
                    
                    'Oui' => true,
                    'Non' => false,
                ],
            ])
            ->add('user', EntityType::class, [
                'class'=> User::class,
                'label'=>"Qui est l'auteur du devis?",
                "attr" => [
                    "class" => "form-control w100",
                ],
                "required" => false,
                "choice_label" => "nom",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Devis::class,
        ]);
    }
}
