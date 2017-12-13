<?php

namespace MyApp\MyMapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()


    {   $Latitudes='-24';
        $Longitudes='142';
        $em = $this->getDoctrine()->getManager();

        $listePlan = $em->getRepository('MyAppUserBundle:Plan')->findAll();

        return $this->render('MyMapBundle:Default:index.html.twig',array('listePlan'=>$listePlan ));
    }
}
