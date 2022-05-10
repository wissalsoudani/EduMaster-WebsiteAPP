<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Entity\Articles;
use App\Form\ActivitesType;
use App\Form\ArticlesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

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
     * @Route("/front/article/{id}", name="liste_articles_front")
     */
    public function articles_par_activite(Activites $activite)
    {
        
        return $this->render('article/list.html.twig', [
            'activite'=>$activite
        ]);

    }

    /**
     * @Route("/activites/mobile/getAll", name="get_all_activites")
     */
    public function getAllActivites(SerializerInterface $serializer)
    {
        $reclamation=$this->getDoctrine()->getRepository(Activites::class)->findAll();

        $jsonContent = $serializer->serialize($reclamation, 'json', ['groups' => 'activites']);
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/activites/mobile/find/{id}", name="find_activites")
     */
    public function findActivitesss($id, SerializerInterface $serializer)
    {
        $reclamation=$this->getDoctrine()->getRepository(Activites::class)->findBy(['idActivites' => $id]);

        $jsonContent = $serializer->serialize($reclamation, 'json', ['groups' => 'activites']);
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/activites/mobile/add", name="add_activites__mobile")
     */
    public function addActivites(Request $request)
    {
        $activites = new Activites();
        $activites->setTitre($request->get("titre"));
        $activites->setDateActivite($request->get("date"));
        $activites->setDescription($request->get("description"));
        $activites->setLieu($request->get("lieu"));
        $activites->setPrixActivite($request->get("prix"));
        $activites->setTypeActivite($request->get("type"));
        $activites->setUpdatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($activites);
        $em->flush();
        return new JsonResponse("done!");
    }

    /**
     * @Route("/activites/mobile/update", name="update_activites")
     */
    public function updateActivites(Request $request)
    {
        $activites = $this->getDoctrine()->getRepository(Activites::class)->find($request->get("id"));
        $activites->setTitre($request->get("titre"));
        $activites->setDescription($request->get("description"));
        $activites->setLieu($request->get("lieu"));
        $activites->setPrixActivite($request->get("prix"));
        $activites->setTypeActivite($request->get("type"));
        $activites->setUpdatedAt(new \DateTime());
        $em = $this->getDoctrine()->getManager();
        $em->persist($activites);
        $em->flush();
        return new JsonResponse("done!");

    }

    /**
     * @Route("/activites/mobile/delete/{id}", name="delete_activites")
     */
    public function deleteActivites($id, Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(Activites::class)->find($id);

        $em=$this->getDoctrine()->getManager();
        $em->remove($articles);
        $em->flush();
        return new JsonResponse("done!");
    }

}
