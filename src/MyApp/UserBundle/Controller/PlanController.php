<?php
/**
 * Created by PhpStorm.
 * User: roufa
 * Date: 26/11/2016
 * Time: 03:57
 */

namespace MyApp\UserBundle\Controller;
use MyApp\UserBundle\Entity\Plan;
use MyApp\UserBundle\Form\DateFrom;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanController extends Controller
{
    public function  ajoutAction(Request $request)
    {
        $plan=new Plan();
        if ($request->isMethod('POST')){
            $plan->setNom($request->get('nom'));
            $plan->setVille($request->get('ville'));
            $plan->setLatitude($request->get('Latitude'));
            $plan->setLongitude($request->get('Longitude'));
            $em=$this->getDoctrine()->getManager();
            $em->persist ($plan);
            $em->flush();
        }

        return $this->render('MyAppUserBundle:Plan:ajout.html.twig',array());
    }
    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $plan=$em->getRepository("MyAppUserBundle:Plan")->findAll();
        return $this->render('MyAppUserBundle:Plan:list.html.twig',array("plans"=>$plan));
    }

    public function DeleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $plan=$em->getRepository("MyAppUserBundle:Plan")->find($id);

        $em->remove($plan);
        $em->flush();
        return $this->redirectToRoute('planbase');
    }
    public function UpdateAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $plan = $em->getRepository("MyAppUserBundle:Plan")->find($id);
        $Form = $this->createForm(DateFrom::class, $plan);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plan);
            $em->flush();
            return $this->redirect($this->generateUrl('planbase'));
        }
        return $this->render('MyAppUserBundle:Plan:update.html.twig', array('form' => $Form->createView()));
    }

}