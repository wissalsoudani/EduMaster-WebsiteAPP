<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuizRepo;
use App\Repository\FournisseurRepository;
use App\Repository\ProduitRepo;


class TemplateController extends AbstractController
{


    /**
     * @Route("/template", name="template")
     */
    public function indexe(FournisseurRepository $fourrepo,ProduitRepo $produitrepo): Response
    {
        return $this->render('template/index2.html.twig', [
            'controller_name' => 'TemplateController',
            'Fournisseur' => $fourrepo->createQueryBuilder('u')->select('u')->getQuery()->getResult(),
            'Produit' => $produitrepo->createQueryBuilder('u')->select('u')->getQuery()->getResult()
        
        ]);
    }

    

    /**
     * @Route("/templateback", name="templateback")
     */
    public function index(): Response
    {
        return $this->render('template/index3.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }



}
