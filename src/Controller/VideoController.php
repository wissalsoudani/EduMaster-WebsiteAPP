<?php

namespace App\Controller;
use App\Entity\Video;
use App\Form\VideoType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideoController extends AbstractController
{
    /**
     * @Route("/video", name="app_video")
     */
    public function index(): Response
    {
        return $this->render('video/index.html.twig', [
            'controller_name' => 'VideoController',
        ]);
    }
     /**
     * @Route("/listVideos", name="listVideos")
     */
    public function listvideos()
    {
        $videoss = $this->getDoctrine()->getRepository(Video::class)->findAll();
        return $this->render('video/list.html.twig', ["videoss" => $videoss]);
    }

  
/**
     * @Route("/listVideosf", name="listVideosf")
     */
    public function listvideoss()
    {
        $videoss = $this->getDoctrine()->getRepository(Video::class)->findAll();
        return $this->render('video/listf.html.twig', ["videoss" => $videoss]);
    }
    /**
     * @Route("/addVideos", name="addVideos")
     */
    public function addVideos(Request $request)
    {
        $videos = new Video();
        $form = $this->createForm(VideoType::class, $videos);
        $form->add("Ajouter", SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $description = $form->get('description')->getData();
            $fichier = $videos->getNomVideo() . '.' . $description->guessExtension();

            $description->move(
                $this->getParameter('images_directory'),
                $fichier
            );
            $videos->setDescription($fichier);
            $em = $this->getDoctrine()->getManager();
           
            $em->persist($videos);
            $em->flush();
            return $this->redirectToRoute('listVideos');
        }
        return $this->render("video/add.html.twig", array('form' => $form->createView()));
    }

    /**
     * @Route("/deletev/{id_video}", name="deleteVideos")
     */
    public function deleteVideos($id_video)
    {
        $videos = $this->getDoctrine()->getRepository(Video::class)->find($id_video);
        $em = $this->getDoctrine()->getManager();
        $em->remove($video);
        $em->flush();
        return $this->redirectToRoute("listVideos");
    }

  

    /**
     * @Route("/updateV/{id_video}", name="updateVideos")
     */
    public function updateVideos(Request $request, $id_video)
    {
        $videos = $this->getDoctrine()->getRepository(Video::class)->find($id_video);
        $form = $this->createForm(VideoType::class, $videos);
        $form->add("Modifier", SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $description = $form->get('description')->getData();
            $fichier = $videos->getNomVideo() . '.' . $description->guessExtension();

            $description->move(
                $this->getParameter('images_directory'),
                $fichier
            );
            $videos->setDescription($fichier);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listVideos');
        }
        return $this->render("video/update.html.twig", array('form' => $form->createView()));
    }

}
