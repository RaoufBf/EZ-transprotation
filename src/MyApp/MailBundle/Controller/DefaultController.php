<?php

namespace MyApp\MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppMailBundle:Default:index.html.twig');
    }
}
