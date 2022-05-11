<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="list_article")
     */
    public function index(): Response
    {

        $repository = $this->getDoctrine()->getRepository(Articles::class);
        $articles = $repository->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/add", name="add_article")
     */
    public function create(EntityManagerInterface $entityManager, Request $request): Response
    {

        $article = new Articles();
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', 'article created! ');
            return $this->redirectToRoute('list_article');

        }
        return $this->render('article/AddUpdate.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/update/{article}", name="update_article")
     */
    public function update(EntityManagerInterface $entityManager, Articles $article, Request $request): Response
    {
        $form = $this->createForm(ArticlesType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            $this->addFlash('success', 'article updated! ');
            return $this->redirectToRoute('list_article');

        }
        return $this->render('article/AddUpdate.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/delete/{article}", name="delete_articles")
     */
    public function delete(Articles $article, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($article);
        $entityManager->flush();
        $this->addFlash('alert', 'article deleted! ');
        return $this->redirectToRoute('list_article');
    }

    /**
     * @Route("/article/like/{article}", name="like_article")
     */
    public function like(EntityManagerInterface $entityManager, Articles $article, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article->setNombreLike($article->getNombreLike() + 1);
        $entityManager->flush();
        return $this->redirectToRoute('liste_articles_front', ['id' => $article->getActivite()->getIdActivites()]);
    }

    /**
     * @Route("/article/dislike/{article}", name="dislike_article")
     */
    public function dislike(EntityManagerInterface $entityManager, Articles $article, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        if ($article->getNombreLike() > 0) {
            $article->setNombreLike($article->getNombreLike() - 1);
        }
        $entityManager->flush();
        return $this->redirectToRoute('liste_articles_front', ['id' => $article->getActivite()->getIdActivites()]);

    }
    /**
     * @Route("/article/top_rated", name="top_articles")
     */
    public function top_article(EntityManagerInterface $entityManager): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $articles=$entityManager->getRepository(Articles::class)->findBy([],['nombreLike'=>'DESC'],3);
        $entityManager->flush();
        return $this->render('article/top.html.twig', ['articles'=>$articles]);

    }
}
