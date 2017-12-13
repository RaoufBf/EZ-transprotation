<?php

namespace MyApp\UserBundle\Repository;
use Doctrine\ORM\EntityRepository ;
use MyApp\UserBundle\Entity\Offre;

class OffreRepository extends EntityRepository
{
    public function findOffreVilledep($ville_depart)
    {
        $query=$this->getEntityManager()
            ->createQuery("select m from MyAppUserBundle:Offre m WHERE m.ville_depart=:ville_depart")->setParameter('ville_depart',$ville_depart);
        return $query->getResult();



    }
    public function findOffreimage($ville_depart)
    {
        $query=$this->getEntityManager()
            ->createQuery("select m from MyAppUserBundle:Offre m WHERE m.imageoffre=:image")->setParameter('ville_depart',$ville_depart);
        return $query->getResult();



    }
    public function afficherOffre(){


        $req=$this->getEntityManager()
            ->createQuery("SELECT r from MyAppUserBundle:Offre r where r.datefin>=CURRENT_DATE()");
        return $req->getResult();
    }




}