<?php


namespace MyApp\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class OffreForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomoffre')
            ->add('description')
            ->add('pourcentage')
            ->add('datedebut')
            ->add('datefin')
            ->add('imageoffre',FileType::class, array('data_class' =>null))
            ->add('nbrjm')
            ->add('pointfidelite')
            ->add('num',EntityType::class, array(
                'class' => 'MyAppUserBundle:Voyage',
                'choice_label' =>'num',
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
