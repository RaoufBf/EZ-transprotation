<?php

namespace MyApp\UserBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateFrom extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('ville')
            ->add('latitude')
            ->add('longitude')
            ->setMethod('GET')
            ->add('save',SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {


    }
    public function getName()
    {
        return 'my_app_user_bundle_from';
    }
}
