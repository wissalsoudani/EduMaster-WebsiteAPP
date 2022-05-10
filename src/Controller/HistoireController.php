<?php

namespace App\Controller;
use GuzzleHttp\Psr7\UploadedFile;

use App\Entity\Histoire;
use App\Form\HistoireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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
     * @Route ("/back/ajouterHistoire", name ="ajouterHistoire")
     */
    public function ajouterHistoire(Request $request){
        $histoire = new Histoire();
        $form = $this->createForm(HistoireType::class,$histoire);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid()){

            /**
             * @var UploadedFile $file
             * @var UploadedFile $pdf
             */
            $file = $form['couvertureHistoire']->getData();
            $pdf= $form['contenuHistoire']->getData();

            $file->move('images/histoires/couverture/', $file->getClientOriginalName());
            $histoire->setCouvertureHistoire("images/histoires/couverture/".$file->getClientOriginalName());

            $pdf->move('images/histoires/contenu/', $pdf->getClientOriginalName());
            $histoire->setContenuHistoire("images/histoires/contenu/".$pdf->getClientOriginalName());

            $em = $this->getDoctrine()->getManager();
            $em->persist($histoire);
            $em->flush();
            $this->addFlash('success','histoire ajouté avec succées!');
            return $this->redirectToRoute("afficherHistoire");
        }
        return $this->render("histoire/ajouterHistoireBack.html.twig", array("formHistoire"=>$form->createView()));
    }


    /**
    * @Route ("/back/afficherHistoire",name ="afficherHistoire")
     */
    public function afficherHistoire(Request $request){

        $histoire=$this->getDoctrine()->getRepository(Histoire::class)->findAll();
        $em=$this->getDoctrine()->getManager();
        //Search by Ajax
        if ($request->isXmlHttpRequest()) {
            $search  = $request->get('search');
            dump($search);
            $repo  = $em->getRepository(Histoire::class);
            $event = $repo->find($search);
        }
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
     * @Route("/AllHistoires", name="AllHistoires", methods={"GET","POST"})
     */
    public function AllHistoires(NormalizerInterface $Normalizer){
        $repository=$this->getDoctrine()->getRepository(Histoire::class);
        $histoire=$repository->findAll();
        $jsonContent = $Normalizer->normalize($histoire, 'json', ['groups'=>'post:read']);
       return $this->render('histoire/AllHistoireJSON.html.twig', [
           'data'=>$jsonContent,
       ]);
    }


    public function rechercheAjaxAction(Request $request)
    {

    }

    /**
     * @param $id
     * @Route ("/afficherDetailsHistoire/{id}",name="afficherDetailsHistoire")
     */
    public function afficherDetailsHistoire($id){
        $histoire=$this->getDoctrine()->getRepository(Histoire::class)->find($id);
        return $this->render("histoire/afficherDetailsHistoire.html.twig",array('histoire'=>$histoire));
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
        $this->addFlash('success','histoire supprimé avec succées!');
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
            /**
             * @var UploadedFile $file
             * @var UploadedFile $pdf
             */

            $file = $form['couvertureHistoire']->getData();
            $pdf= $form['contenuHistoire']->getData();

            $file->move('images/histoires/couverture/', $file->getClientOriginalName());
            $histoire->setCouvertureHistoire("images/histoires/couverture/".$file->getClientOriginalName());

            $pdf->move('images/histoires/contenu/', $pdf->getClientOriginalName());
            $histoire->setContenuHistoire("images/histoires/contenu/".$pdf->getClientOriginalName());

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success','histoire modifié avec succées!');
            return $this->redirectToRoute("afficherHistoire");
        }
        return $this->render("histoire/modifierHistoireBack.html.twig", array("formHistoire"=>$form->createView()));
    }

}
