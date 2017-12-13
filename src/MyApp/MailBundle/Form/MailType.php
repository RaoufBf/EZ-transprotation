<?php

namespace MyApp\MailBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use MyApp\UserBundle\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
          //  ->add('nbr', EmailType::class)
            ->add('tel', IntegerType::class)
            ->add('email', EmailType::class)
          //  ->add('pseudo', EmailType::class)
           // ->add('num', EmailType::class)

            ->add('text', TextareaType::class)
            ->add('valider', SubmitType::class) ;
    }

    public function getName()
    {
        return 'Mail';
    }
}

