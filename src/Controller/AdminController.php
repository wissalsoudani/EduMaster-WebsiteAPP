<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Groups;





/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $admins = $entityManager
            ->getRepository(Admin::class)
            ->findAll();

        return $this->render('admin/index.html.twig', [
            'admins' => $admins,
        ]);
    }
 /**
     * @Route("/AllAdmin", name="AllAdmin")
     */
    public function AllAdmin(NormalizerInterface $Normalizer){
        $repository=$this->getDoctrine()->getRepository(Admin::class);
        $admin=$repository->findAll();
        $jsonContent = $Normalizer->normalize($admin, 'json', ['groups'=>'post:read']);
        return new Response(json_encode($jsonContent));
    }
     /**
     * @Route("/addAdminJSON/new", name="addAdminJSON")
     */
    public function addAdminJSON(Request $request, NormalizerInterface $Normalizer)
    {
       $admin = new Admin();
       $admin->setIdAbonnement($request->get('id_abonnement'));
       $admin->setLogin($request->get('login'));
       $admin->setMdp($request->get('mdp'));
       $admin->setNom($request->get('nom'));
       $admin->setPrenom($request->get('prenom'));
       $admin->setNiveau($request->get('niveau'));
       $admin->setMail($request->get('mail'));

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($admin);
            $em->flush();
            $formatted= $Normalizer->normalize($admin, 'json',['groups'=>'post:read']);
            return new JsonResponse($formatted);
    }

    /**
     * @Route("/updateAdminJSON/{id_admin}", name="updateAdminJSON")
     */
    public function updateAdminJSON(Request $request, NormalizerInterface $Normalizer,$id_admin)
    {
        $admin = $this->getDoctrine()->getRepository(Admin::class)->find($id_admin);

        $admin->setLogin($request->get('login'));
        $admin->setMdp($request->get('mdp'));
        $admin->setNom($request->get('nom'));
        $admin->setPrenom($request->get('prenom'));
        $admin->setMail($request->get('mail'));

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($admin);
            $em->flush();
            $formatted= $Normalizer->normalize($admin, 'json',['groups'=>'post:read']);
            return new JsonResponse($formatted);
            
        
     
    }
        /**
     * @Route("/deleteAdminJSON/{id_admin}", name="deleteAdminJSON")
     */
    public function deleteAdminJSON(Request $request, NormalizerInterface $Normalizer,$id_admin)
    {
            $em = $this->getDoctrine()->getManager();
            $admin = $em->getRepository(Admin::class)->find($id_admin);
            $em->remove($admin);
            $em->flush();
            $formatted= $Normalizer->normalize($admin, 'json',['groups'=>'post:read']);
            return new JsonResponse($formatted);
    }





    /**
     * @Route("/new", name="app_admin_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($admin);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/new.html.twig', [
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAdmin}", name="app_admin_show", methods={"GET"})
     */
    public function show(Admin $admin): Response
    {
        return $this->render('admin/show.html.twig', [
            'admin' => $admin,
        ]);
    }

    /**
     * @Route("/{idAdmin}/edit", name="app_admin_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdminType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/edit.html.twig', [
            'admin' => $admin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idAdmin}", name="app_admin_delete", methods={"POST"})
     */
    public function delete(Request $request, Admin $admin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$admin->getIdAdmin(), $request->request->get('_token'))) {
            $entityManager->remove($admin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
