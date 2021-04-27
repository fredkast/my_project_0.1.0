<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'label'=>'Votre Email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci d\'entrer un e-mail',
                    ]),
                ],
                'required' => true,
                // 'attr' => ['class' =>'form-control'],
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Vous etes un : ',
                'choices' => [
                    'PARTICULIER ' => 'ROLE_USER',
                    'PROFESSIONNEL' => 'ROLE_CLIENT',
                ],
                // A AMELIORER
                'expanded' => false,
                'multiple' => true
            ])
            ->add('nom', TextType::class, [
                'label'=>"Nom",
                'constraints'=>[
                    new Length([
                        'min'=>1,
                        'minMessage'=>"Votre nom d'utilisateur doit avoir plus de 4 caractères"
                    ]),
                    ],
            ])
            ->add('prenom', TextType::class, [
                'label'=>"Prénom",
                'constraints'=>[
                    new Length([
                        'min'=>1,
                        'minMessage'=>"Votre nom d'utilisateur doit avoir plus de 4 caractères"
                    ]),
                    ],
            ])
            ->add('adresse', TextType::class, [
                'label'=>"Votre adresse",
                'constraints'=>[
                    new Length([
                        'min'=>4,
                        'minMessage'=>"Votre nom d'utilisateur doit avoir plus de 4 caractères"
                    ]),
                    ],
            ]) 
            ->add('telephone', TextType::class, [
                'label'=>"Votre telephone",
                'constraints'=>[
                    new Length([
                        'min'=>1,
                        'minMessage'=>"Votre nom d'utilisateur doit avoir plus de 10 caractères"
                    ]),
                    ],
            ])                                                 
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Tapez un mot de passe',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Votre mot de passe doit contenir {{ limit }} caracteres minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add("RGPD", CheckboxType::class, [
                'label'=>"J'accepte les conditions d'utilisation",
                'label_attr'=>['id'=>'rgpd'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Vous devez accepeter les conditions d'utilisation",
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
