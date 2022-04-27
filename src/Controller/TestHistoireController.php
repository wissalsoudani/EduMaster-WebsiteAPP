<?php

namespace App\Controller;

use App\Entity\TestHistoire;
use App\Entity\User;
use App\Entity\Histoire;
use App\Form\TestHistoireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestHistoireController extends AbstractController
{

//$current_user=1;
    /**
     * @Route("/test/histoire", name="app_test_histoire")
     */
    public function index(): Response
    {
        return $this->render('test_histoire/index.html.twig', [
            'controller_name' => 'TestHistoireController',
        ]);
    }

    /**
     * @Route ("/back/ajouterTestHistoire", name ="ajouterTestHistoire")
     */
    public function ajouterTestHistoire(Request $request)
    {
        $TestHistoire = new TestHistoire();
        $form = $this->createForm(TestHistoireType::class, $TestHistoire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($TestHistoire);
            $em->flush();
            return $this->redirectToRoute("afficherTestHistoire");
        }
        return $this->render("test_histoire/ajouterTestHistoire.html.twig", array("formTestHistoire" => $form->createView()));
    }

    /**
     * @Route ("/back/afficherTestHistoire",name ="afficherTestHistoire")
     */
    public function afficherTestHistoire()
    {
        $TestHistoire = $this->getDoctrine()->getRepository(TestHistoire::class)->findAll();
        return $this->render("test_histoire/afficherTestHistoire.html.twig", array('Testhistoires' => $TestHistoire));
    }


    public function validTest(TestHistoire $t1, TestHistoire $t2): bool
    {

        return true;
    }

    /**
     * @param $idHistoire
     * @Route ("/afficherTest/{idHistoire}",name="afficherTest")
     */
    public function afficherTest(Request $request, $idHistoire)
    {

        $connectedUser = $this->getDoctrine()->getRepository(User::class)->find(1);

        $TestHistoireValid = $this->getDoctrine()->getManager()
            ->createQuery('SELECT i
            FROM App\Entity\TestHistoire i
            WHERE i.idHistoire = :id_histoire')
            ->setParameter('id_histoire', $idHistoire)
            ->getOneOrNullResult();

        $c1 = $TestHistoireValid->getCorrectionq1();
        $c2 = $TestHistoireValid->getCorrectionq2();
        $c3 = $TestHistoireValid->getCorrectionq3();

        $r1 = $request->query->get('R1');
        $r2 = $request->query->get('R2');
        $r3 = $request->query->get('R3');


        if ((strcmp($c1, $r1) == 0) && (strcmp($c2, $r2) == 0) && (strcmp($c3, $r3) == 0)) {
            $this->addFlash('success','Test valide  avec succées!');




        }


        $TestHistoire = new TestHistoire();


        $form = $this->createForm(TestHistoireType::class, $TestHistoire);
        $form->handleRequest($request);
        if (false) {

            return $this->redirectToRoute("afficherH");
        } else {
            return $this->render("test_histoire/afficherTest.html.twig", array('testHistoireValide' => $TestHistoireValid));
        }
        return $this->render("test_histoire/afficherTest.html.twig", array('testHistoireValide' => $TestHistoireValid));
    }

    /**
     * @param $idTest
     * @Route ("/back/supprimerTestHistoire/{idTest}",name="supprimerTestHistoire")
     */
    public function supprimerTestHistoire($idTest)
    {
        $TestHistoire = $this->getDoctrine()->getRepository(TestHistoire::class)->find($idTest);
        $em = $this->getDoctrine()->getManager();
        $em->remove($TestHistoire);
        $em->flush();
        return $this->redirectToRoute("afficherTestHistoire");
    }


    /**
     * @Route ("/back/modifierTestHistoire/{idTest}",name="modifierTestHistoire")
     */
    public function modifierTestHistoire(Request $request, $idTest)
    {
        $Testhistoire = $this->getDoctrine()->getRepository(TestHistoire::class)->find($idTest);
        $form = $this->createForm(TestHistoireType::class, $Testhistoire);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("afficherTestHistoire");
        }
        return $this->render("test_histoire/modifierTestHistoire.html.twig", array('formTestHistoire' => $form->createView()));
    }


    /**
     * @Route ("/back/validation/{idTest}/{question}/{reponse1}/{reponse2}/{reponse3}",name="validerTestHistoire")
     */
    public function validation(Request $request, $idTest, $question, $reponse1, $reponse2, $reponse3)
    {
        $em = $this->getDoctrine()->getManager();
        $Testhistoire = $this->getDoctrine()->getRepository(TestHistoire::class)->find($idTest);
        $query1 = $em->createQuery(
            'Select correctionQ1 FROM src/Entity/TestHistoire 
            where id_test=$idTest '
        );

        $query2 = $em->createQuery(
            'Select correctionQ2 FROM src/Entity/TestHistoire 
where id_test=$idTest'
        );

        $query3 = $em->createQuery(
            'Select correctionQ3 FROM src/Entity/TestHistoire
where id_test=$idTest'
        );

        $correction1 = $query1->getResult;
        $correction2 = $query2->getResult;
        $correction3 = $query3->getResult;
        $current_user = 1; // To change Wissal
        $user = $this->getDoctrine()->getRepository(User::class)->findBy($current_user);


        $form = $this->createForm(TestHistoireType::class, $Testhistoire);
        $form->handleRequest($request);
        $r = 0;
        if ($form->isSubmitted()) {
            $r = $r + 1;
            if ($correction1 == $reponse1) {
                $score = $user->getScore();
                $score = $score + 10;
                $user->setScore($score);
                $this->getDoctrine()->getManager()->flush();

            }
            if ($correction2 == $reponse2) {
                $r = $r + 1;
                $score = $user->getScore();
                $score = $score + 10;
                $user->setScore($score);
                $this->getDoctrine()->getManager()->flush();
            }
            if ($correction3 == $reponse3) {
                $r = $r + 1;
                $score = $user->getScore();
                $score = $score + 10;
                $user->setScore($score);
                $this->getDoctrine()->getManager()->flush();
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            if ($r == 3) {
                return $this->render("Testhistoire/GOOD.html.twig", array("formTestHistoire" => $form->createView()));

            } else {
                return $this->render("Testhistoire/WRONG.html.twig", array("formTestHistoire" => $form->createView()));
            }
        }


    }
}
