<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCLient',TextType::class,array(
                'label'=>'Nom :',
                'label_attr'=>array(
                    'class'=>'required',
                ),
            ))
            ->add('prenomClient',TextType::class,array(
                'label'=>'Prénom :',
                'label_attr'=>array(
                    'class'=>'required',
                ),
            ))
            ->add('adresseClient',TextType::class,array(
                'label'=>'Adresse :',
                'label_attr'=>array(
                    'class'=>'required',
                ),
            ))
            ->add('mailClient',EmailType::class,array(
                'label'=>'adresse E-mail :',
                'label_attr'=>array(
                    'class'=>'required',
                ),
            ))
            ->add('telephoneClient',TelType::class,array(
                'label'=>'Telephone :',
                'label_attr'=>array(
                    'class'=>'required',
                ),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
