<?php

namespace MyApp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('cin')
            //->add('pseudo')
            //->add('num')
           // ->add('dateDepart')
           // ->add('villeDepart')
            ->add('num',EntityType::class,array('class'=>'MyAppUserBundle:Voyage',
                'choice_label'=>'num','multiple'=>false))

            ->add('nbrPlace')
            //->add('paiement')
            //->add('dateReservation')
            ->add('Confirmer la reservation' ,SubmitType::class)
          ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\UserBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_userbundle_reservation';
    }


}
