<?php
/**
 * Created by PhpStorm.
 * User: ines2016
 * Date: 15/11/2016
 * Time: 10:47
 */

namespace MyApp\UserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use MyApp\UserBundle\Form\VoyageType;

class rechercheVoyageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('duree')
            ->add('Rechercher',SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {

    }
    public function getName()
    {
        return 'myapp_user_bundlererecherche_voyage_form';
    }

}