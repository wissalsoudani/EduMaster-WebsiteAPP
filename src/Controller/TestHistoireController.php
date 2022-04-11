<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestHistoireController extends AbstractController
{
    /**
     * @Route("/test/histoire", name="app_test_histoire")
     */  
    public function index(): Response
    {
        return $this->render('test_histoire/index.html.twig', [
            'controller_name' => 'TestHistoireController',
        ]);
    }
}
