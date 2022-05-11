<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Entity\Articles;
use App\Form\ActivitesType;
use App\Form\ArticlesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivitesController extends AbstractController
{
    /**
     * @Route("/activites", name="liste_activites")
     */
    public function index(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Activites::class);
        $activites=$repository->findAll();
        return $this->render('activites/index.html.twig', [
            'activites'=>$activites
        ]);
    }
    /**
     * @Route("/activites/add", name="add_activites")
     */
    public function create(EntityManagerInterface $entityManager,Request $request): Response
    {

        $activite= new Activites();
        $form= $this->createForm(ActivitesType::class, $activite,['action' => $this->generateUrl('add_activites')]);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($activite);
            $entityManager->flush();
            $this->addFlash('success', 'activite created! ');
            return $this->redirectToRoute('liste_activites');

        }
        return $this->render('activites/AddUpdate.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/activites/update/{activite}", name="update_activites")
     */
    public function update(EntityManagerInterface $entityManager,Activites $activite,Request $request): Response
    {
        $form= $this->createForm(ActivitesType::class, $activite);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            $this->addFlash('success', 'activite updated! ');
            return $this->redirectToRoute('liste_activites');

        }
        return $this->render('activites/AddUpdate.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/activites/delete/{activite}", name="delete_activites")
     */
    public function delete(Activites $activite,EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($activite);
        $entityManager->flush();
        $this->addFlash('alert', 'activite deleted! ');
        return $this->redirectToRoute('liste_activites');
    }
    /**
     * @Route("/front/activites", name="liste_activites_front")
     */
    public function index_front(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Activites::class);
        $activites=$repository->findAll();
        return $this->render('activites/list.html.twig', [
            'activites'=>$activites
        ]);
    }
    /**
     * @Route("/front/activite/{id}", name="liste_articles_front")
     */
    public function articles_par_activite(Activites $activite)
    {
        
        return $this->render('article/list.html.twig', [
            'activite'=>$activite
        ]);

    }
}
