<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/03/2019
 * Time: 22:30
 */

namespace ConnexionBundle\Form;

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
        $builder->add('label', TextType::class)
                ->add('Enregistrer',SubmitType::class);
    }

}