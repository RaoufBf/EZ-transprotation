<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 25/11/2016
 * Time: 10:33
 */

namespace MyApp\UserBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\UserBundle\Entity\Promotion;
use MyApp\UserBundle\Form\PromotionForm;

class PromotionController extends Controller
{
    public function AjoutAction(Request $request)
    {
        $promo=new Promotion();
        $Form=$this->createForm(PromotionForm::class,$promo);
        $Form->handleRequest($request);
        if($Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($promo);
            $em->flush();
            return $this->redirectToRoute('AffichagePromo');

        }
        return $this->render('MyAppUserBundle:Promotions:ajout.html.twig',array('Form'=>$Form->createView()));
    }
    public function ListAction()
{
    $em=$this->getDoctrine()->getManager();
    $promotion=$em->getRepository('MyAppUserBundle:Promotion')->findAll();
    return $this->render("MyAppUserBundle:Promotions:list.html.twig",array('promotions'=>$promotion));
}
    public function ListclientAction()
    {
        $em=$this->getDoctrine()->getManager();
        $promotion=$em->getRepository('MyAppUserBundle:Promotion')->findAll();
        return $this->render("MyAppUserBundle:Promotions:listclient.html.twig",array('promotions'=>$promotion));
    }
    public function DeleteAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $promo=$em->getRepository("MyAppUserBundle:Promotion")->find($id);
        $em->remove($promo);
        $em->flush();
        return $this->redirectToRoute('AffichagePromo');
    }
    public function UpdateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $promotion=$em->getRepository("MyAppUserBundle:Promotion")->find($id);
        $Form=$this->createForm(PromotionForm::class,$promotion);
        $Form->handleRequest($request);
        if($Form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);
            $em->flush();
            return $this->redirect($this->generateUrl('AffichagePromo'));
        }
        return $this->render('MyAppUserBundle:Promotions:update.html.twig',array('form'=>$Form->createView()));
    }
}