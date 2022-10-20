<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;

use App\Repository\AnnonceRepository;

class HomeController extends AbstractController {

    private AnnonceRepository $annonceRepository;



    public function __construct(AnnonceRepository $annonceRepository)
    {

        $this->annonceRepository = $annonceRepository;

    }

    #[Route('/', 'home.index')]
    public function index() : Response
    {

        $tabAnnonce = $this->annonceRepository->findAll();

        return $this->render('pages/home.html.twig', ['tabAnnonce' => $tabAnnonce]);
    }

}