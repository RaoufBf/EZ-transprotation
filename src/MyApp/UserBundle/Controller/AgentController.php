<?php

namespace MyApp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AgentController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppUserBundle:Agent:index.html.twig');
    }
}