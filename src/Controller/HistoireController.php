<?php

namespace App\Controller;

use App\Entity\Histoire;
use App\Form\HistoireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoireController extends AbstractController
{
    /**
     * @Route("/histoire", name="app_histoire")
     */
    public function index(): Response
    {
        return $this->render('histoire/index.html.twig', [
            'controller_name' => 'HistoireController',
        ]);
    }

    /**
     * @param Request $request
     * @Route ("/back/ajouterHistoire", name ="")
     */

    public function ajouterHistoire(Request $request){
        $histoire = new Histoire();
        $form = $this->createForm(HistoireType::class,$histoire);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($histoire);
            $em->flush();
            return $this->redirectToRoute("afficherHistoire");
        }
        return $this->render("histoire/ajouterHistoireBack.html.twig", array("formHistoire"=>$form->createView()));
    }

    /**
    * @Route ("/back/afficherHistoire",name ="afficherHistoire")
     */
    public function afficherHistoire(){

        $histoire=$this->getDoctrine()->getRepository(Histoire::class)->findAll();
        return $this->render("histoire/afficherHistoireBack.html.twig",array('histoires'=>$histoire));
    }

    /**
     * @Route ("/afficherHistoire",name ="afficherH")
     */
    public function afficher(){

        $histoire=$this->getDoctrine()->getRepository(Histoire::class)->findAll();
        return $this->render("histoire/afficherHistoire.html.twig",array('histoires'=>$histoire));
    }

    /**
     * @param $id
     * @Route ("/back/supprimerHistoire/{id}",name="supprimerHistoire")
     */
    public function supprimerHistoire($id){
        $histoire = $this->getDoctrine()->getRepository(Histoire::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($histoire);
        $em->flush();
        return $this->redirectToRoute("afficherHistoire");
    }

    /**
     * @Route ("/back/modifierHistoire/{id}",name="modifierHistoire")
     */
    public function modifierHistoire(Request  $request, $id){
        $histoire = $this->getDoctrine()->getRepository(Histoire::class)->find($id);
        $form = $this->createForm(HistoireType::class,$histoire);
        $form->handleRequest($request);
        if ( $form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficherHistoire");
        }
        return $this->render("histoire/modifierHistoireBack.html.twig", array("formHistoire"=>$form->createView()));
    }

}
