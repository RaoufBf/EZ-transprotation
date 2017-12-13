<?php

namespace MyApp\UserBundle\Form;

use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Extension\Core\DataTransformer\DateTimeToStringTransformerTest;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\DateTimeValidator;
use Symfony\Component\Validator\Constraints\TimeValidator;

class VoyageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder//->add('dateDepart')
        ->add('dateDepart', DateType::class, array(
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
        ))
               ->add('heureDepart')
        //    ->format('Y-m-d H:i:s')
            ->add('dateArrivee', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ))

              // ->add('dateArrivee')

                ->add('heureArrivee')
                //->add('villeDepart')

                ->add('villeDepart',EntityType::class,array('class'=>'MyAppUserBundle:Plan',
                    'choice_label'=>'ville',
                    'multiple'=>false,
                ))

                //->add('villeArrivee')
                ->add('villeArrivee',EntityType::class,array('class'=>'MyAppUserBundle:Plan',
                    'choice_label'=>'ville',
                    'multiple'=>false,
                ))

              //->add('type')
              ->add('type',EntityType::class,array('class'=>'MyAppUserBundle:Moyentransport',
                  'choice_label'=>'type',
                  'multiple'=>false,
              ))
                 ->add('prix')
                 ->add('duree')
                 ->add('capaciteMoyen')

           ->add('Enregistrer',SubmitType::class)

;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\Voyage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_voyage';
    }


}
