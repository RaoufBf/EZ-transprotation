<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 24/11/2016
 * Time: 16:04
 */

namespace MyApp\UserBundle\Controller;


use MyApp\UserBundle\Entity\Offre;
use MyApp\UserBundle\Form\OffreForm;
use MyApp\UserBundle\Form\RechercheOffreForm;
use MyApp\UserBundle\Form\RecherchOffre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Cache\Persister\EntityRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class OffreController extends Controller
{

    public function afficherAction(){
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository('MyAppUserBundle:Offre')->findAll();
        return $this->render('MyAppUserBundle:Offre:affiche.html.twig',array('offres'=> $offre));

    }
    public function  AjoutAction(Request $request)
    {
        if(!$this->get('security.authorization_checker')->isGranted('ROLE_RESPONSABLE'))
        {
            return $this->redirectToRoute("fos_user_security_login");
        }
        $offre = new Offre();
        $Form = $this->createForm(OffreForm::class, $offre);
        $Form->handleRequest($request);
        //$starttime = $request->get("datedebut");
        //$endtime = $request->get("datefin");
        if ($Form->isValid())
        {   $em = $this->getDoctrine()->getManager();
        $offre->upload();
        $em->persist($offre);
        $em->flush();
        //  return $this->redirectToRoute('ajouter_offre');
        return $this->redirect($this->generateUrl('afficher_offre'));
    }

        return $this->render('MyAppUserBundle:Offre:ajout.html.twig',array('form'=>$Form->createView()));
    }

    public function DeleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("MyAppUserBundle:Offre")->find($id);
        $em->remove($offre);
        $em->flush();
        return $this->redirectToRoute('afficher_offre');
    }
    public function UpdateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository("MyAppUserBundle:Offre")->find($id);
        $Form=$this->createForm(OffreForm::class,$offre);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $offre->upload();
            $em->persist($offre);

            $em->flush();
            return $this->redirect($this->generateUrl('afficher_offre'));
        }
        return $this->render('MyAppUserBundle:Offre:update.html.twig',array('form'=>$Form->createView()));
    }

    public function RechercheAction(Request $request)
    {   $offre = new Offre();
        $a=$offre->getIdoffre();
        $em=$this->getDoctrine()->getManager();
        //$id_ap = $this->container->get('security.context')->getToken()->getUser()->getId();
        $offres=$em->getRepository("MyAppUserBundle:Offre")->findAll();

        $Form=$this->createForm(RechercheOffreForm::class,$offre);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $offres=$em->getRepository("MyAppUserBundle:Offre")->findBy(array('nomoffre'=>$offre->getNomoffre()));
    }
        return $this->render('MyAppUserBundle:Offre:RechercherOf.html.twig',array('form'=>$Form->createView(),'offres'=>$offres));
    }
public function rechercherAction(Request $request)
{
    $offre = new Offre();
    $a=$offre->getIdoffre();
    $em=$this->getDoctrine()->getManager();
    //$id_ap = $this->container->get('security.context')->getToken()->getUser()->getId();
    $offres=$em->getRepository("MyAppUserBundle:Offre")->findAll();

    $Form=$this->createForm(RecherchOffre::class,$offre);
    $Form->handleRequest($request);
    if($Form->isValid()) {
        $offres=$em->getRepository("MyAppUserBundle:Offre")->findBy(array('datedebut'=>$offre->getDatedebut()));
    }
    return $this->render('MyAppUserBundle:Offre:RechercheOffreClient.html.twig',array('form'=>$Form->createView(),'offres'=>$offres));




}

    public function afficherClientAction(){
        $em=$this->getDoctrine()->getManager();
        $offre=$em->getRepository('MyAppUserBundle:Offre')->afficherOffre();
        return $this->render('MyAppUserBundle:Offre:afficheClient.html.twig',array('offres'=> $offre));
            }


}
