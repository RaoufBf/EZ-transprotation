<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 02/12/2016
 * Time: 00:26
 */

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\Mail;
use MyApp\UserBundle\Form\MailType;
use Buzz\Message\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;
use Symfony\Component\HttpFoundation\Request;
class MailController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form=  $this->createForm(MailType::class,  $mail);
        $form->handleRequest($request) ;
        if ($form->isValid()) {
            $message = Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('darknesslady502@gmail.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'MyAppUserBundle::email.html.twig',
                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }

        return $this->render('MyAppUserBundle:Default:index.html.twig', array('form'=>$form->createView()));
    }
    public function successAction(){
        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail.");
    }

}