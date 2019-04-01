<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 28/03/2019
 * Time: 15:24
 */

namespace ConnexionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CIType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('isMusic', CheckboxType::class, [
                        'label'    => 'Music',
                        'required' => false,])

                ->add('isSport', CheckboxType::class, [
                    'label'    => 'Sport',
                    'required' => false,])

                ->add('isNews', CheckboxType::class, [
                    'label'    => 'News',
                    'required' => false,])

                ->add('isTravel', CheckboxType::class, [
                    'label'    => 'Travel',
                    'required' => false,])

                ->add('Enregistrer',SubmitType::class);
    }

    /**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ConnexionBundle\Entity\CentreInteret'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'connexionbundle_CentreInteret';
    }

}