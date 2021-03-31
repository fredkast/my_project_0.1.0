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
            ->add('typeMaison',ChoiceType::class,array(
                // intitulé
                'label'=>'Type de maison : ',
                // css de l'intitulé
                'choices'=>array(
                    'Moderne'=>"Moderne",
                    'Traditionnelle'=>"Traditionnelle",
                    'Maison en bois'=>"Maison en bois",
                    "D'architecte"=>"Maison d'architecte",
                ),
                //champs
                'attr'=>array(
                    'class'=>'',
                )
            ))
            // ->add('typeUsage',TextType::class,array(
            //     'label'=>"Type d'usage :",
            //     'label_attr'=>array(
            //         'class'=>'required'
            //     ),
            // ))
            ->add('typeUsage',ChoiceType::class,array(
                    'label'=>"Type d'usage :",
                    'choices'=>array(
                        'Principale'=>"Principale",
                        'Secondaire'=>"Secondaire",
                        'Extension'=>"Extension",
                        'Dependance'=>"Dependence",
                    ),
                   
                ))
            ->add('surface',TextType::class,array(
                'label'=>"Quelle surface habitable souhaitez-vous en m2 ? :",
                'label_attr'=>array(
                    // 'class'=>'required'
                ),
                'attr'=>array(
                    'class'=>'',
                )
            ))
            ->add('budget',TextType::class,array(
                'label'=>"Quel est votre budget ? ",
                'label_attr'=>array(
                    // 'class'=>'required'
                ),
                'attr'=>array(
                    'class'=>'',
                )
            ))
            ->add('etages',IntegerType::class,array(
                'label'=>"Combien d'étages souhaitez-vous ?",
                'label_attr'=>array(
                    // 'class'=>'required'
                ),
            ))
            ->add('chambres',IntegerType::class,array(
                'label'=>"Combien de chambres souhaitez-vous ?",
                'label_attr'=>array(
                    // 'class'=>'required'
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
            // ->add('User', EntityType::class, [
            //     'class'=> User::class,
            //     'label'=>"Qui est l'auteur du devis?",
            //     "choice_label" => "nom",
            // ])
            ->add('User', EntityType::class, [
                    
                    'class'=> User::class,
                    'label'=>"Qui est l'auteur du devis?",
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
