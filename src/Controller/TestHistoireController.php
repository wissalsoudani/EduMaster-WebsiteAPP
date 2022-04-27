<?php

namespace App\Controller;

use App\Entity\TestHistoire;
use App\Entity\User;
use App\Entity\Histoire;
use App\Form\TestHistoireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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

    /**
     * @param $idHistoire
     * @Route ("/afficherTest/{idHistoire}",name="afficherTest")
     */
    public function afficherTest(Request $request,MailerInterface $mailer, $idHistoire)
    {

        $connectedUser = $this->getDoctrine()->getRepository(User::class)->find(20);
        $hiss = $this->getDoctrine()->getRepository(Histoire::class)->find($idHistoire);

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

        if ($r1 == NULL && $r2 == NULL && $r3 == NULL) {

        } else {

            if ((strcmp($c1, $r1) == 0) && (strcmp($c2, $r2) == 0) && (strcmp($c3, $r3) == 0)) {
                $this->addFlash('success', 'Test valide  avec succées!');
                $connectedUser->setScore($connectedUser->getScore() + 10);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                //email update score to user
                $email = (new Email())
                    ->from('wissal.soudani@esprit.tn')
                    ->to($connectedUser->getMail())
                    ->subject('Félicitation ' . $connectedUser->getNom().'! ')
                    ->text('Le score de votre enfant a éte augmenté!');
                $mailer->send($email);
            } else {
                $this->addFlash('error', 'Test non valide!');
            }
        }
        return $this->render("test_histoire/afficherTest.html.twig", array('testHistoireValide' => $TestHistoireValid,'histoire'=>$hiss));
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
}
