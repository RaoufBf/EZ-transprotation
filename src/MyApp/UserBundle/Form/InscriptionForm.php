<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 01/12/2016
 * Time: 04:45
 */

namespace MyApp\UserBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('idOffre',EntityType::class, array(
                'class' => 'MyAppUserBundle:Offre',
                'choice_label' =>'idOffre',
                'multiple' => false,
            ))
            ->add('pseudo',EntityType::class, array(
                'class' => 'MyAppUserBundle:utilisateur',
                'choice_label' =>'username',
                'multiple' => false,
            ))



            ->setMethod('GET')
            ->add('save',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver){

    }
    public function getName(){
        return'myapp_userBundle_Form';
    }

}