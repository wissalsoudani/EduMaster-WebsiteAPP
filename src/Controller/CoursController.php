<?php

namespace App\Controller;
use App\Entity\Cours;
use App\Form\CoursType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;



class CoursController extends AbstractController
{
    /**
     * @Route("/cours", name="app_cours")
     */
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

     /**
     * @Route("/listCours", name="listCours")
     */
    public function listcourss()
    {
        $courss = $this->getDoctrine()->getRepository(Cours::class)->findAll();
        return $this->render('cours/list.html.twig', ["courss" => $courss]);
    }
    /**
     * @Route("/listCoursf", name="listCourfs")
     */
    public function listcours()
    {
        $courss = $this->getDoctrine()->getRepository(Cours::class)->findAll();
        return $this->render('cours/listf.html.twig', ["courss" => $courss]);
    }

  

    /**
     * @Route("/addCours", name="addCours")
     */
    public function addCours(Request $request)
    {
        $cours = new Cours();
        $form = $this->createForm(CoursType::class, $cours);
        $form->add("Ajouter", SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contenuCours = $form->get('contenuCours')->getData();
            $fichier = $cours->getNomCours() . '.' . $contenuCours->guessExtension();

            $contenuCours->move(
                $this->getParameter('images_directory'),
                $fichier
            );
           $cours->setContenuCours($fichier);

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($cours);
            $em->flush();
            return $this->redirectToRoute('listCours');
        }
        return $this->render("cours/add.html.twig", array('form' => $form->createView()));
    }

    /**
     * @Route("/delete/{id_cours}", name="deleteCours")
     */
    public function deleteCours($id_cours)
    {
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);
        $em = $this->getDoctrine()->getManager();
        $em->remove($cours);
        $em->flush();
        return $this->redirectToRoute("listCours");
    }

  

    /**
     * @Route("/update/{id_cours}", name="updateCours")
     */
    public function updateCours(Request $request, $id_cours)
    {
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);
        $form = $this->createForm(CoursType::class, $cours);
        $form->add("Modifier", SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ) {
            $contenuCours = $form->get('contenuCours')->getData();
            $fichier = $cours->getNomCours() . '.' . $contenuCours->guessExtension();

            $contenuCours->move(
                $this->getParameter('images_directory'),
                $fichier
            );
           $cours->setContenuCours($fichier);
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('listCours');
        }
        return $this->render("cours/update.html.twig", array('form' => $form->createView()));
    }

}
