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
            ->add('departement', ChoiceType::class, [
                'choices'  => [
                    '01 - Ain'=>"1",
                    '02 - Aisne'=>"2",
                    '03 - Allier'=>"3",
                    '04 - Alpes-de-Haute-Provence'=>"4",
                    '05 - Hautes-alpes'=>"5",
                    '06 - Alpes-maritimes'=>"6",
                    '07 - Ardèche'=>"7",
                    '08 - Ardennes'=>"8",
                    '09 - Ariège'=>"9",
                    '10 - Aube'=>"10",
                    '11 - Aude '=>"11",
                    '12 - Aveyron'=>"12",
                    '13 - Bouches-du-Rhône'=>"13",
                    '14 - Calvados'=>"14",
                    '15 - Cantal'=>"15",
                    '16 - Charente'=>"16",
                    '17 - Charente-maritime'=>"17",
                    '18 - Cher'=>"18",
                    '19 - Corrèze'=>"19",
                    '2A - Corse-du-sud'=>"2A",
                    '2B - Haute-Corse'=>"2B",
                    "21 - Côte-d'Or"=>"21",
                    "22 - Côtes-d'Armor"=>"22",
                    '23 - Creuse'=>"23",
                    '24 - Dordogne'=>"24",
                    '25 - Doubs'=>"25",
                    '26 - Drôme '=>"26",
                    '27 - Eure'=>"27",
                    '28 - Eure-et-loir '=>"28",
                    '29 - Finistère'=>"29",
                    '30 - Gard '=>"30",
                    '31 - Haute-garonne'=>"31",
                    '32 - Gers'=>"32",
                    '33 - Gironde '=>"33",
                    '34 - Hérault'=>"34",
                    '35 - Ille-et-vilaine'=>"34",
                    '36 - Indre'=>"36",
                    '37 - Indre-et-loire'=>"37",
                    '38 - Isère'=>"38",
                    '39 - Jura'=>"39",
                    '40 - Landes'=>"40",
                    '41 - Loir-et-cher'=>"41",
                    '42 - Loire'=>"42",
                    '43 - Haute-loire'=>"43",
                    '44 - Loire-atlantique'=>"44",
                    '45 - Loiret'=>"45",
                    '46 - Lot'=>"46",
                    '47 - Lot-et-garonne'=>"47",
                    '48 - Lozère'=>"48",
                    '49 - Maine-et-loire'=>"49",
                    '50 - Manche'=>"50",
                    '51 - Marne'=>"51",
                    '52 - Haute-marne'=>"52",
                    '53 - Mayenne'=>"53",
                    '54 - Meurthe-et-moselle '=>"54",
                    '55 - Meuse'=>"55",
                    '56 - Morbihan'=>"56",
                    '57 - Moselle'=>"57",
                    '58 - Nièvre'=>"58",
                    '59 - Nord'=>"59",
                    '60 - Oise '=>"60",
                    '61 - Orne'=>"61",
                    '62 - Pas-de-calais'=>"62",
                    '63 - Puy-de-dôme'=>"63",
                    '64 - Pyrénées-atlantiques'=>"64",
                    '65 - Hautes-Pyrénées'=>"65",
                    '66 - Pyrénées-orientales'=>"66",
                    '67 - Bas-rhin'=>"67",
                    '68 - Haut-rhin'=>"68",
                    '69 - Rhône'=>"69",
                    '70 - Haute-saône'=>"70",
                    '71 - Saône-et-loire'=>"71",
                    '72 - Sarthe'=>"72",
                    '73 - Savoie'=>"73",
                    '74 - Haute-savoie'=>"74",
                    '75 - Paris '=>"75",
                    '76 - Seine-maritime'=>"76",
                    '77 - Seine-et-marne'=>"77",
                    '78 - Yvelines'=>"78",
                    '79 - Deux-sèvres'=>"79",
                    '80 - Somme'=>"80",
                    '81 - Tarn '=>"81",
                    '82 - Tarn-et-Garonne'=>"82",
                    '83 - Var'=>"83",
                    '84 - Vaucluse'=>"84",
                    '85 - Vendée'=>"85",
                    '86 - Vienne'=>"86",
                    '87 - Haute-vienne'=>"87",
                    '88 - Vosges'=>"88",
                    '89 - Yonne'=>"89",
                    '90 - Territoire de belfort'=>"90",
                    '91 - Essonne'=>"91",
                    '92 - Hauts-de-seine'=>"92",
                    '93 - Seine-Saint-Denis'=>"93",
                    '94 - Val-de-marne'=>"94",
                    "95 - Val-d'Oise"=>"95",
                ],
            ]);


            // pas de user car il est par default remplis : utilisateur connecter
            // ->add('User', EntityType::class, [
            //     'class'=> User::class,
            //     'label'=>"Qui est l'auteur du devis?",
            //     "choice_label" => "nom",
            // ])
          
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Devis::class,
        ]);
    }
}
