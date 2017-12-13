<?php

namespace MyApp\UserBundle\Controller;
use MyApp\UserBundle\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\UserBundle\Entity\Voyage;
use MyApp\UserBundle\Form\VoyageType;
use MyApp\UserBundle\Form\ReservationType;
use Symfony\Component\Form\DateType;
use MyApp\UserBundle\Form\rechercheVoyageForm;
use MyApp\UserBundle\Form\recherchePrixForm;



class VoyageController extends Controller
{

    public function AjoutAction(Request $request)
    {
        $Voyage=new Voyage();
        $Form=$this->createForm(VoyageType::class,$Voyage);
        $Form->handleRequest($request);

        if($Form->isValid())
        {

                if ( $Voyage->getDateArrivee()<$Voyage->getDateDepart()) {
                    echo "<script>alert(\"Erreur Date Arrivé doit etre supérieur ou égale à la date de départ  \")
                </script>";

                }
                elseif ($Voyage->getVilleDepart()==$Voyage->getVilleArrivee()){
                    echo "<script>alert(\"ville d'arrivée doit etre differente du ville de départ \")
                </script>";

                }
                elseif ($Voyage->getHeureArrivee()<$Voyage->getHeureDepart()){
                    echo "<script>alert(\"Erreur l'Heure Arrivé doit etre supérieur à l'Heure de départ \")
                </script>";

                }
                else {
                    $em=$this->getDoctrine()->getManager();
                    $em->persist($Voyage);
                    $em->flush();
                    return $this->redirectToRoute('afficher_Voyage');
                }


        }
        return $this->render('MyAppUserBundle:Voyage:ajout.html.twig',array('Form'=>$Form->createView()));
    }
    public function ListAction()
    {
        $em=$this->getDoctrine()->getManager();
        $voyage=$em->getRepository('MyAppUserBundle:Voyage')->findAll();
        return $this->render("MyAppUserBundle:Voyage:list.html.twig",array('Voyages'=>$voyage));
    }
    public function AfficchageClientAction()
    {
        $em=$this->getDoctrine()->getManager();
        $voyage=$em->getRepository('MyAppUserBundle:Voyage')->findAll();
        return $this->render("MyAppUserBundle:Voyage:afficher.html.twig",array('Voyages'=>$voyage));
    }
    public function ReserverAfficheClientAction()
    {
        $em=$this->getDoctrine()->getManager();
        $voyage=$em->getRepository('MyAppUserBundle:Voyage')->findAll();
        return $this->render("MyAppUserBundle:Voyage:Reserver.html.twig",array('Voyages'=>$voyage));
    }
    public function DeleteAction(Request $request,$num)
    {

        $em=$this->getDoctrine()->getManager();
        $voyage=$em->getRepository("MyAppUserBundle:Voyage")->find($num);
        $em->remove($voyage);
        $em->flush();
        return $this->redirectToRoute('afficher_Voyage');


    }
    public function UpdateAction(Request $request,$num)
    {

        $em = $this->getDoctrine()->getManager();
        $voyage = $em->getRepository("MyAppUserBundle:Voyage")->find($num);
        $Form=$this->createForm(voyageType::class,$voyage);
        $Form->handleRequest($request);
        if($Form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($voyage);
            $em->flush();
            return $this->redirectToRoute('afficher_Voyage');
        }
        return $this->render("MyAppUserBundle:Voyage:update.html.twig",array('form'=>$Form->createView()));
    }
    public function RecherchedureeAction(Request $request)
    {   $Voyage = new Voyage();
        $a=$Voyage->getduree();
        $em=$this->getDoctrine()->getManager();
        $Voyages=$em->getRepository("MyAppUserBundle:Voyage")->findAll();

        $Form=$this->createForm(rechercheVoyageForm::class,$Voyage);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $Voyages=$em->getRepository("MyAppUserBundle:Voyage")->findBy(array('duree'=>$Voyage->getduree()));
        }
        return $this->render('MyAppUserBundle:Voyage:recherche.html.twig',array('Form'=>$Form->createView(),'Voyages'=>$Voyages));
    }
    public function RecherchePrixAction(Request $request)
    {
        $Voyage = new Voyage();
        $a = $Voyage->getprix();
        $em = $this->getDoctrine()->getManager();
        $Voyages = $em->getRepository("MyAppUserBundle:Voyage")->findAll();

        $Form = $this->createForm(recherchePrixForm::class, $Voyage);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $Voyages = $em->getRepository("MyAppUserBundle:Voyage")->findBy(array('prix' => $Voyage->getprix()));
        }
        return $this->render('MyAppUserBundle:Voyage:recherche.html.twig', array('Form' => $Form->createView(), 'Voyages' => $Voyages));
    }
}
