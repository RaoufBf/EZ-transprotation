<?php

namespace MyApp\MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MyApp\MailBundle\Entity\Mail;
use MyApp\MailBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\BrowserKit\Response;



class MailController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form=  $this->createForm(MailType::class,  $mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Annulation de Réservation non payé')
                ->setFrom('Responsable@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'MyAppMailBundle:Mail:email.html.twig',
                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom(), 'tel' => $mail->getTel(), 'text' => $mail->getText())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));

}
        return $this->render('MyAppMailBundle:Mail:index.html.twig', array('form'=>$form->createView()));
    }
    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail.");
    }

}
