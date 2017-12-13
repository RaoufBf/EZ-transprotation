<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 01/12/2016
 * Time: 04:12
 */

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\Inscription;
use MyApp\UserBundle\Entity\Offre;
use MyApp\UserBundle\Entity\Utilisateur;
use MyApp\UserBundle\Form\InscriptionForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Cache\Persister\EntityRepository;

class InscriptionController extends Controller
{

    public function  AjoutAction(Request $request,$id)
    {
        $inscription=new Inscription();
        $username = $this->getUser()->getUsername();
        $offre = new Offre();
        $offre->setIdoffre($id);
        $user = new Utilisateur();
        $user->setUsername($username);

        echo $id;
        if ($request->isMethod('GET')) {
            $inscription->setIdoffre($offre);
            $inscription->setPseudo($user);
            $inscription->setDateinscription(new \DateTime("now"));

            $em=$this->getDoctrine()->getManager();
            $em->persist($inscription);
            $em->flush();
            return new JsonResponse("vous etes inscris");
        }

        return new Response('ajout effectué avec succés');

    }
}