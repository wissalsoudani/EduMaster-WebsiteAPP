<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Knp\Component\Pager\PaginatorInterface;
use MercurySeries\FlashyBundle\FlashyNotifier;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Repository\FournisseurRepository;


/**
 * @Route("/fournisseur")
 */
class FournisseurController extends AbstractController
{



    /**
     * @Route("/", name="fournisseur_index", methods={"GET"})
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {




        $donnees = $this->getDoctrine()
            ->getRepository(Fournisseur::class)
            ->findBy([],['id' => 'desc']);
        $fournisseurs = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1),4 // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
        // Nombre de résultats par page
        );



        return $this->render('fournisseur/index.html.twig', [
            'fournisseurs' => $fournisseurs,
        ]);



    }







    /**
     * @Route("/new", name="fournisseur_new", methods={"GET","POST"})
     */
    public function new(Request $request,\Swift_Mailer $mailer): Response
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fournisseur);
            $entityManager->flush();






          
            $message = (new \Swift_Message('Hello Fournisseur'))
                ->setFrom('essitsondofranckpatrick@gmail.com')
                ->setTo($fournisseur->getEmail())
            ->setBody('hello')
                ->setBody($this->renderView('emails/email.php.twig', compact('fournisseur')), 'text/html');

              //  ->attach(\Swift_Attachment::fromPath('C:\Users\ASUS\Downloads\Documents\aaa.png'));
            $mailer->send($message);






            return $this->redirectToRoute('fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fournisseur/new.html.twig', [
            'fournisseur' => $fournisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fournisseur_show", methods={"GET"})
     */
    public function show(Fournisseur $fournisseur): Response
    {
        return $this->render('fournisseur/show.html.twig', [
            'fournisseur' => $fournisseur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fournisseur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fournisseur $fournisseur): Response
    {
        $form = $this->createForm(FournisseurType::class, $fournisseur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fournisseur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fournisseur/edit.html.twig', [
            'fournisseur' => $fournisseur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fournisseur_delete", methods={"POST"})
     */
    public function delete(Request $request, Fournisseur $fournisseur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fournisseur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fournisseur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fournisseur_index', [], Response::HTTP_SEE_OTHER);
    }



















    public function getData() :array
    {
        /**
         * @var $Restaurant Resta[]
         */
        $list = [];

        $Restauranttttt = $this->getDoctrine()->getRepository(Fournisseur::class)->findAll();

        foreach ($Restauranttttt as $Resta) {
            $list[] = [
                $Resta->getId(),
                $Resta->getCode(),
                $Resta->getLibelle(),
                $Resta->getResponsable(),
            ];
        }
        return $list;
    }


    /**
     * @Route("/excel/export",  name="export")
     */
    public function export()
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('Fournisseur List');

        $sheet->getCell('A1')->setValue('id');
        $sheet->getCell('B1')->setValue('code');
        $sheet->getCell('C1')->setValue('libelle');
        $sheet->getCell('D1')->setValue('responsable');

        // Increase row cursor after header write
        $sheet->fromArray($this->getData(),null, 'A2', true);
        $writer = new Xlsx($spreadsheet);
        // $writer->save('ss.xlsx');
        $writer->save('Fournisseur'.date('m-d-Y_his').'.xlsx');
        return $this->redirectToRoute('fournisseur_index');

    }












    
/**
     *@Route("/pdf/pdf",name="pdf_index", methods={"GET"})
     */
    public function pdf(FournisseurRepository $crepo)
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fournisseur/pdf.html.twig', [
            'fournisseur' =>$crepo->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A2', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("fournisseurpdf.pdf", [
            "Attachment" => false
        ]);
    }












}
