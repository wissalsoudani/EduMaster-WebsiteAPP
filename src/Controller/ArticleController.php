<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Entity\Articles;
use App\Form\ArticlesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="list_article")
     */
    public function index(): Response
    {

        $repository=$this->getDoctrine()->getRepository(Articles::class);
        $articles=$repository->findAll();
        return $this->render('article/index.html.twig', [
           'articles'=>$articles
        ]);
    }
     /**
     * @Route("/article/add", name="add_article")
     */
    public function create(EntityManagerInterface $entityManager,Request $request): Response
    {

        $article= new Articles();
        $form= $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            return $this->redirectToRoute('list_article');

        }
        return $this->render('article/AddUpdate.html.twig', [
                'form'=>$form->createView()
        ]);
    }
     /**
     * @Route("/article/update/{article}", name="update_article")
     */
    public function update(EntityManagerInterface $entityManager,Articles $article,Request $request): Response
    {
        $form= $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('list_article');

        }
        return $this->render('article/AddUpdate.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/article/delete/{article}", name="delete_articles")
     */
    public function delete(Articles $article,EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('list_article');
    }

    /**
     * @Route("/article/mobile/getAll", name="get_all_articles")
     */
    public function getAllArticles(SerializerInterface $serializer)
    {
        $reclamation=$this->getDoctrine()->getRepository(Articles::class)->findAll();

        $jsonContent = $serializer->serialize($reclamation, 'json', ['groups' => 'articles']);
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/article/mobile/add", name="add_articles")
     */
    public function addArticles(Request $request)
    {
        $activite = $this->getDoctrine()->getRepository(Activites::class)->find($request->get("activite_id"));

        $articles = new Articles();
        $articles->setTitre($request->get("titre"));
        $articles->setContenu($request->get("contenu"));
        $articles->setDateArticle($request->get("date"));
        $articles->setNombreCommentaire(0);
        $articles->setNombreLike(0);
        $articles->setActivite($activite);
        $em = $this->getDoctrine()->getManager();
        $em->persist($articles);
        $em->flush();
        return new JsonResponse("done!");
    }

    /**
     * @Route("/article/mobile/update", name="update_articles")
     */
    public function updateArticles(Request $request)
    {
        $activite = $this->getDoctrine()->getRepository(Activites::class)->find($request->get("activite_id"));

        $articles = $this->getDoctrine()->getRepository(Articles::class)->find($request->get("id"));
        $articles->setTitre($request->get("titre"));
        $articles->setContenu($request->get("contenu"));
        $articles->setNombreCommentaire(0);
        $articles->setNombreLike(0);
        $articles->setActivite($activite);
        $em = $this->getDoctrine()->getManager();
        $em->persist($articles);
        $em->flush();
        return new JsonResponse("done!");

    }

    /**
     * @Route("/article/mobile/delete/{id}", name="delete_articles")
     */
    public function deleteArticles(Request $request)
    {
        $articles = $this->getDoctrine()->getRepository(Articles::class)->find($request->get('id'));

        $em=$this->getDoctrine()->getManager();
        $em->remove($articles);
        $em->flush();
        return new JsonResponse("done!");
    }

}
