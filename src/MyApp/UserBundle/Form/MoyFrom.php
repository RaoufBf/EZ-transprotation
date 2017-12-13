<?php

namespace MyApp\UserBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoyFrom extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule')
            ->add('type')
            ->add('CapaciteMoyen')
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
