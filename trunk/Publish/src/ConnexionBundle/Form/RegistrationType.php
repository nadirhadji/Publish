<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 17/03/2019
 * Time: 18:13
 */

namespace ConnexionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('firstName')
                ->add('lastName')
                ->add('phone')
                ->add('gender' , ChoiceType::class, [
                    'choices' => [
                        'Homme' => "homme",
                        'Femme' => "femme" ,

                    ]
                ])
                ->add('city')
                ->add('country')
                ->add('image', FileType::class);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}