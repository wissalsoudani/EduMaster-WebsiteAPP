<?php

namespace App\Controller;
use App\Entity\Famille;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
class MobilefamilleController extends AbstractController
{


 /**
     * @Route("/famille_mobile", name="famille_mobile")
     */
    public function famillemobile( NormalizerInterface  $normalizer)
    {

        $Famille = $this->getDoctrine()->getRepository(Famille::class)->findAll();
        $json = $normalizer->normalize($Famille, "json", ['groups' => ['famille','famille']]);
        return new JsonResponse($json);

    }




    
     /**
     * @Route("/newfamille_mobile/{libelle}", name="newfamille_mobile", methods={"GET","POST"})
     */
    public function newfamille($libelle,NormalizerInterface  $normalizer )
    {

        $produit = new Famille();
        $produit->setLibelle($libelle);
       

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produit);
        $entityManager->flush();
        $json = $normalizer->normalize($produit, "json", ['groups' => ['famille']]);
        return new JsonResponse($json);

    }




     /**
     * @Route("/SupprimerFamille", name="SupprimerFamille")
     */
    public function SupprimerFamille(Request $request)
    {

        $idE = $request->get("id");
        $em = $this->getDoctrine()->getManager();
        $Famille = $em->getRepository(Famille::class)->find($idE);
        if($Famille != null)
        {
            $em->remove($Famille);
            $em->flush();
            $serializer = new Serializer([new ObjectNormalizer()]);
            $formated = $serializer->normalize("Famille ete supprimer avec succées ");
            return new JsonResponse($formated);
        }

    }





     /******************Modifier Famille*****************************************/
    /**
     * @Route("/updateFamille", name="updateFamille")
     */
    public function updateFamille(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $Famille = $this->getDoctrine()->getManager()->getRepository(Famille::class)->find($request->get("id"));


        $Famille->setLibelle($request->get("libelle"));
    
        

        $em->persist($Famille);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Famille);
        return new JsonResponse("Famille a ete modifiee avec success.");

    }





}
