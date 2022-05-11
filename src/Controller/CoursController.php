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
use App\Repository\CoursRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Dompdf\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;


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
    public function listcourss(Request $request, PaginatorInterface $paginator)
    {
        $donnees = $this->getDoctrine()->getRepository(Cours::class)->findAll();
        $courss = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            2
        );
        return $this->render('cours/list.html.twig', ["courss" => $courss]);
    }
    /**
     * @Route("/listCoursf", name="listCourfs")
     */
    public function listcours(Request $request, PaginatorInterface $paginator)
    {
        $donnees = $this->getDoctrine()->getRepository(Cours::class)->findAll();
        $courss = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            2
        );
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
     /**
     * @Route("/stats", name="stats")
     */
    public function statistiques(CoursRepository $CoursRep){
        
        $cours = $CoursRep->findAll();

        $nomCours = [];
        $nbPages = [];
        
        foreach($cours as $cour){
            $nomCours[] = $cour->getNomCours();
            $nbPages[] = $cour->getNbPages();
            
        }
        return $this->render('cours/stats.html.twig', [
            'nomCours' => json_encode($nomCours),
            'nbPages' => json_encode($nbPages),
        ]);
    }
    
    /**
     *@Route("/PDF/{id_cours}", name="pdf")
     */
    public function pdf($id_cours)
    {

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);
        
    
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('cours/PDF.html.twig', [
            'cours' => $cours
        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }
     /**
   * Creates a new ActionItem entity.
   *
   * @Route("/search", name="ajax_search")
   * @Method("GET")
   */
  public function searchAction(Request $request , CoursRepository $rep)
  {
      $em = $this->getDoctrine()->getManager();
      $requestString = $request->get('q');
      $cours = $rep->findEntitiesByString($requestString);
      if (!$cours) {
          $result['courss']['error'] = "cours introuvable 🙁 ";
      } else {
          $result['courss'] = $this->getRealEntities($cours);
      }
      return new Response(json_encode($result));
  }
  

public function getRealEntities($cours){

    foreach ($cours as $cours){
        $realEntities[$cours->getIdCours()] = [$cours->getNomCours() ,$cours->getContenuCours()];
    }

    return $realEntities;
}
  /**
     * @Route("/detailCours/{id_cours}", name="detailCours")
     */
    public function DetailCours($id_cours)
    {
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);

        return $this->render('cours/detailCours.html.twig', ["c" => $cours]);
    }

 /**
     * @Route("/listCoursJSON", name="listCoursJSON")
     */
    public function listcoursJSON(NormalizerInterface $Normalizer)
    {
        $cours= $this->getDoctrine()->getRepository(Cours::class)->findAll();
       $serializer= new Serializer([new ObjectNormalizer()]);
       $formatted= $Normalizer->normalize($cours, 'json',['groups'=>'post:read']);
        return new JsonResponse($formatted);
    }

 /**
     * @Route("/addCoursJSON/new", name="addCoursJSON")
     */
    public function addCoursJSON(Request $request, NormalizerInterface $Normalizer)
    {
        $cours = new Cours();

       $cours->setNomCours($request->get('nom_cours'));
       $cours->setContenuCours($request->get('contenu_cours'));
       $cours->setNbPages($request->get('nb_pages'));
       $cours->setNbChapitres($request->get('nb_chapitres'));

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($cours);
            $em->flush();
            $formatted= $Normalizer->normalize($cours, 'json',['groups'=>'post:read']);
            return new JsonResponse($formatted);
           
        
     
    }
     /**
     * @Route("/updateCoursJSON/{id_cours}", name="updateCoursJSON")
     */
    public function updateCoursJSON(Request $request, NormalizerInterface $Normalizer,$id_cours)
    {
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);

       $cours->setNomCours($request->get('nom_cours'));
       $cours->setContenuCours($request->get('contenu_cours'));
       $cours->setNbPages($request->get('nb_pages'));
       $cours->setNbChapitres($request->get('nb_chapitres'));

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($cours);
            $em->flush();
            $formatted= $Normalizer->normalize($cours, 'json',['groups'=>'post:read']);
            return new JsonResponse($formatted);
           
        
     
    }
    /**
     * @Route("/deleteCoursJSON/{id_cours}", name="deleteCoursJSON")
     */
    public function deletecoursJSON(Request $request, NormalizerInterface $Normalizer,$id_cours)
    {
        $cours = $this->getDoctrine()->getRepository(Cours::class)->find($id_cours);

            $em = $this->getDoctrine()->getManager();
            
            $em->remove($cours);
            $em->flush();
            $formatted= $Normalizer->normalize($cours, 'json',['groups'=>'post:read']);
            return new JsonResponse("le cours a ete supprime avec succes".json_encode($formatted));;

    }



}
