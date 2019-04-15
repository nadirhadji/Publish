<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/03/2019
 * Time: 22:30
 */

namespace ConnexionBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', EntityType::class, array(
            'attr'=>array('class'=>"user",),
            'label'=>'Friend',

            'choices_as_values' => true, //
            'class' => 'ConnexionBundle\Entity\User',
            'choice_label' => 'User_Name',

        ))
                ->add('Enregistrer',SubmitType::class);
    }

}