<?php

namespace MyApp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PromotionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('num',EntityType::class, array(
                'class' => 'MyAppUserBundle:Voyage',
                'choice_label' =>'num',
                'multiple' => false,
            ))
            ->add('datedebut',DateType::class)
            ->add('datefin',DateType::class)
            ->add('pourcentage')
            ->add('imageProm',FileType::class,array('data_class'=>null))
            ->add('nomProm')
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'my_app_user_bundle_promotion_form';
    }
}
