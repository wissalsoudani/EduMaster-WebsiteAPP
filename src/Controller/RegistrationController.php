<?php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Abonnement;
use App\Form\UserType;
use App\Controller\AbonnementController;
use App\Form\AbonnementType;
use App\Repository\UserRepository;
use App\Repository\UserSecurityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use \Twilio\Rest\Client;

use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;
    private $twilio;


    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             // Set their role
            $user->setRoles(['ROLE_USER']);
            
            // Encode the new users password
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));

           

            $abonnement = new Abonnement();
           // $idAbonnement=random_int(10,199);
           // $abonnement->setIdAbonnement((String) $idAbonnement);
            $abonnement->setLoginUser($user->getLogin());
            $abonnement->setType("Visiteur");
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnement);
            $em->flush();
            $user->setAbonnement($abonnement);


            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

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


            return $this->redirectToRoute('app_login');

            
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}