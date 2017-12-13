<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 24/11/2016
 * Time: 15:16
 */

namespace MyApp\UserBundle\Controller;


use MyApp\UserBundle\Entity\Reclamation;
use MyApp\UserBundle\Form\ReclamationForm;
use MyApp\UserBundle\Form\ReclamationRechercheForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class ReclamationController extends Controller
{


    public function afficherAction(){
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository('MyAppUserBundle:Reclamation')->findAll();
        return $this->render('MyAppUserBundle:Reclamation:afficher.html.twig',array('reclamations'=> $reclamation));

    }
    public function  ajoutAction(Request $request)
    {
        $reclamation=new Reclamation();
        $username = $this->getUser ()->getUsername ();

        if ($request->isMethod('POST')){
            $reclamation->setMsg($request->get('msg'));
            $reclamation->setPseudo($username);
            $reclamation->setDatereclamation(new \DateTime("now"));

            $em=$this->getDoctrine()->getManager();
            $em->persist ($reclamation);
            $em->flush();
            echo "<script>alert(\"message envoyée avec succées  \")
                </script>";
          //  return new JsonResponse("message envoyée avec succées");
        }

        return $this->render('MyAppUserBundle:Reclamation:ajout.html.twig',array());
    }
    public function DeleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository("MyAppUserBundle:Reclamation")->find($id);
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute('afficher_reclamation');
    }
    public function UpdateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation=$em->getRepository("MyAppUserBundle:Reclamation")->find($id);
        $Form=$this->createForm(ReclamationForm::class,$reclamation);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();
            return $this->redirect($this->generateUrl('afficher_reclamation'));
        }
        return $this->render('MyAppUserBundle:Reclamation:update.html.twig',array('form'=>$Form->createView()));
    }

    public function RechercheAction(Request $request)
    {   $reclamation = new Reclamation();
        $a=$reclamation->getIdreclamation();
        $em=$this->getDoctrine()->getManager();
        //$user = $this->container->get('security.context')->getToken()->getUser();
       // $reclamation->setPseudo($user);
        $reclamations=$em->getRepository("MyAppUserBundle:Reclamation")->findAll();

        $Form=$this->createForm(ReclamationRechercheForm::class,$reclamation);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $reclamations=$em->getRepository("MyAppUserBundle:Reclamation")->findBy(array('pseudo'=>$reclamation->getPseudo()));
        }
        return $this->render('MyAppUserBundle:Reclamation:recherche.html.twig',array('form'=>$Form->createView(),'reclamations'=>$reclamations));
    }

}