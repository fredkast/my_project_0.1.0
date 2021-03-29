<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'constraints'=>[
                    new NotBlank([
                        'message'=>"Merci d'indiquer un mail",
                    ]),
                    ],
                'required'=> true,
                'attr'=>['class'=>'form-control'],

            ])
            ->add('roles', ChoiceType::class,[
                'choice'=>[
                    'utilisateur'=>'ROLE_USER',
                    'CLIENT'=>'ROLE_CLIENT',
                    'ADMIN'=>'ROLE_ADMIN'
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôles' 
            ])
            ->add('password')
            ->add('userName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
