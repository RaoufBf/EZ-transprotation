<?php

namespace MyApp\UserBundle\Controller;

use MyApp\UserBundle\Entity\Voyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\UserBundle\Entity\Reservation;
use Symfony\Component\Form\DateType;
use MyApp\UserBundle\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends Controller
{

    public function ResAction(Request $request,$num)
    {
        $Reservation=new Reservation();
        $em = $this->getDoctrine()->getManager();

        $Form1=$this->createForm(ReservationType::class,$Reservation);
        $Form1->handleRequest($request);
        if($Form1->isValid()){
            // $user = $this->container->get('security.context')->getToken()->getUser();
            $em = $this->getDoctrine()->getManager();
            $user=$this->getUser();
            $Reservation->setPseudo($user);
            $Reservation->setDateReservation(new \DateTime("now"));
            $Reservation->setPaiement("non payé");
            $em->persist($Reservation);
            $em->flush();

            return $this->redirectToRoute('affichage_Reserver');
        }
        return $this->render("MyAppUserBundle:Voyage:Res.html.twig",array('form'=>$Form1->createView()));
    }
    public function TestAction(Request $request,$num)
    {
        $Reservation=new Reservation();
        $Voyage=new Voyage();
      //  $em = $this->getDoctrine()->getManager();

        $em=$this->getDoctrine()->getManager();
        $Voyage=$em->getRepository("MyAppUserBundle:Voyage")->find($num);

            // $user = $this->container->get('security.context')->getToken()->getUser();
        if ($request->isMethod('POST')) {
            $Reservation->setNbrPlace($request->get('nbr'));
            $x=$request->get('nbr');
            $user = $this->getUser();
            $email = $user->getEmail();
            $Reservation->setNum($Voyage);
            $Reservation->setPseudo($user);
            $Reservation->setMail($email);
            $Reservation->setDateReservation(new \DateTime("now"));
            $Reservation->setPaiement("non payé");
            $y=$Voyage->getCapaciteMoyen();
            $z=$y-$x;
            if(($z>=0)&&($x>0)){
                $em->persist($Reservation);
                $em->flush();
                $Voyage->setCapaciteMoyen($Voyage->getCapaciteMoyen() - $x);
                $em->persist($Voyage);
                $em->flush();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Réservation')
                    ->setFrom('asma.pidev@gmail.com')
                    ->setTo($email)
                    ->setBody($this->renderView(
                        'MyAppMailBundle:Mail:email.html.twig',
                        array('nom' => $user->getNom(), 'prenom' => $user->getPrenom(),'nbr'=>$x,'num'=>$Voyage->getNum())
                    ),
                        'Text/html');
                $this->get('mailer')->send($message);
                return $this->redirectToRoute('affichage_Reserver');
            }
            else{           echo "<script>alert(\"nombre de place non disponible \")
                </script>";}
        }
        return $this->render("MyAppUserBundle:Voyage:test.html.twig",array());
    }
    public function AfficheResAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Reservation = $em->getRepository("MyAppUserBundle:Reservation")->findAll();

        return $this->render("MyAppUserBundle:Reservation:AfficheRes.html.twig", array('Reservations' => $Reservation));
    }

    public function DeleteResAction(Request $request,$idRes)
    {
$Voyage=new Voyage();

        $em=$this->getDoctrine()->getManager();
        $Reservation=$em->getRepository("MyAppUserBundle:Reservation")->find($idRes);
        $a=$Reservation->getNum();
        $Voyage=$em->getRepository("MyAppUserBundle:Voyage")->find($a);
       $x=$Reservation->getNbrPlace();
        $email=$Reservation->getMail();
       // $x=$em->getRepository("MyAppUserBundle:Reservation")->find();
       // $Voyage=$em->getRepository("MyAppUserBundle:Voyage")->find($num);
       $y=$Voyage->getCapaciteMoyen();
        $z=$x+$y;
        $Voyage->setCapaciteMoyen($z);
        $em->persist($Voyage);
        $em->flush();
        $query=$em->createQuery('DELETE MyAppUserBundle:Reservation x WHERE  x.idRes = ?1 AND x.paiement =?2');
        $query->setParameter(1,$idRes);
        $query->setParameter(2,'non payé');
        $query->execute();
        $em->flush();
        $message = \Swift_Message::newInstance()
            ->setSubject('Annulation de reservation')
            ->setFrom('asma.pidev@gmail.com')
            ->setTo($email)
            ->setBody($this->renderView(
                'MyAppMailBundle:Mail:annuler.html.twig',
                array('pseudo' => $Reservation->getPseudo())
            ),
                'Text/html');
        $this->get('mailer')->send($message);
       // $em->remove($Reservation);
        //$em->flush();
        return $this->redirectToRoute('affichReservation');


    }
}
