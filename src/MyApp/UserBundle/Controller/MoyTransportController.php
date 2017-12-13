<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 23/11/2016
 * Time: 17:02
 */

namespace MyApp\UserBundle\Controller;
use MyApp\UserBundle\Form\MoyFrom;
use MyApp\UserBundle\Entity\Moyentransport;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MoyTransportController extends Controller
{
    public function  ajoutAction(Request $request)
    {
        $moytransport=new Moyentransport();
        if ($request->isMethod('POST')){
            $moytransport->setMatricule($request->get('matricule'));
            $moytransport->setType($request->get('type'));
            $moytransport->setCapaciteMoyen($request->get('capacite_moyen'));
            $em=$this->getDoctrine()->getManager();
            $em->persist ($moytransport);
            $em->flush();
        }

        return $this->render('MyAppUserBundle:Moyentransport:ajout.html.twig',array());
    }

    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $moytransport=$em->getRepository("MyAppUserBundle:Moyentransport")->findAll();
        return $this->render('MyAppUserBundle:Moyentransport:list.html.twig',array("moytransports"=>$moytransport));
    }

    public function DeleteAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $moytransport=$em->getRepository("MyAppUserBundle:Moyentransport")->find($id);
        $em->remove($moytransport);
        $em->flush();
        return $this->redirectToRoute('Moydebase');
    }

    public function UpdateAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $moytransport = $em->getRepository("MyAppUserBundle:Moyentransport")->find($id);
        $Form = $this->createForm(MoyFrom::class, $moytransport);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moytransport);
            $em->flush();
            return $this->redirect($this->generateUrl('Moydebase'));
        }
        return $this->render('MyAppUserBundle:Moyentransport:update.html.twig', array('form' => $Form->createView()));
    }
}