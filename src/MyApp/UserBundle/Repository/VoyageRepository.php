<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 30/11/2016
 * Time: 19:53
 */

namespace MyApp\UserBundle\Repository;
use Doctrine\ORM\Cache\Persister\EntityRepository;


class VoyageRepository extends EntityRepository

{
 public function findByVilledep($ville_depart)
 {
     $query=$this->getEntityManager()
    ->createQuery("select m from MyAppUserBundle:Voyage m WHERE m.ville_depart=:ville_depart")->setParameter('ville_depart',$ville_depart);
 return $query->getResult();
 }
    public function afficherV($id){
        $req=$this->getEntityManager() ->createQuery('select m from MyAppUserBundle:Voyage m where m.num='.$id);
        return $req->getResult();

    }
}