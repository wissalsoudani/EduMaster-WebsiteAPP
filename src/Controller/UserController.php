<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use \Twilio\Rest\Client;
use Knp\Component\Pager\PaginatorInterface;



/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    private $twilio;
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {
        $donnees = $entityManager
            ->getRepository(User::class)
            ->findAll();

            $users = $paginator->paginate(
                $donnees,
                $request->query->getInt('page',1),
                6
            );

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/stat", name="stats_ind" , methods={"GET", "POST"})
     */

    public function statistiques(UserRepository $userRepository)
    {
        
        $users = $userRepository->findAll();

        $id_user = [];
        $niveau = [];
        

        foreach($users as $user){
            $id_user[] = $user->getId();
            $niveau[] = $user->getNiveau() ;
            
        }


        return $this->render('user/stats.html.twig', [
            'id_user' => json_encode($id_user),
            'niveau' => json_encode($niveau),
        ]);
    }

    /**
     * @Route("/listu", name="user_list", methods={"GET"})
     */
    public function listu(UserRepository $userRepository): Response
    {
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $users = $userRepository->findAll();

            
            // Retrieve the HTML generated in our twig file
            $html = $this->renderView('user/listu.html.twig', [
                'users' => $users,
            ]);

            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the HTML as PDF
            $dompdf->render();
    
            // Output the generated PDF to Browser (force download)
            $dompdf->stream("mypdf.pdf", [
                "Attachment" => false
            ]);
        }
        
        
    
    


    /**
     * @Route("/new", name="new_user", methods={"GET", "POST"})
     */
    public function addUser(Request $request, EntityManagerInterface $entityManager): Response
    {
       
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            $sid = "AC25722a6dd46b8364e96c40ba80dfd2bb"; // Your Account SID from www.twilio.com/console 
            $token = "e7b33bd6da9cec16243006f2492296c4"; // Your Auth Token from www.twilio.com/console
            $client = new Client($sid, $token);
            
             $message = $client->messages 
             ->create("+21658413886", // to 
                      array(  
                          "messagingServiceSid" => "MG132f0deba7a168f99e796edd4859aaf3",      
                          "body" => "Cher Admin, un nouveau utilisateur vient de créer un compte. Vous pouver intervenir en cas de contraintes. " 
                      ) 
             ); 
            print($message->sid);


            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id_user}", name="show_user", methods={"GET"})
     */
    public function showUser(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id_user}/edit", name="edit_user", methods={"GET", "POST"})
     */
    public function editUser(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id_user}", name="delete_user", methods={"POST"})
     */
    public function deleteUser(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    }

    
}
