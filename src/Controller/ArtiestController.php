<?php

namespace App\Controller;

use App\Entity\Artiest;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtiestController extends AbstractController
{
    #[Route('/artiest', name: 'artiest')]
    public function index(): Response
    {
        $artiest = [
            "naam" => "Tiesto",
            "genre" => "Dance",
            "omschrijving" => "Muzikant",
            "afbeelding_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/Ti%C3%ABsto_%40_Airbeat_One_2017.jpg/266px-Ti%C3%ABsto_%40_Airbeat_One_2017.jpg",
            "website" => "https://melkweg.nl",
        ];

        $repository = $this->getDoctrine()->getRepository(Artiest::class);
        $result = $repository->saveArtiest($artiest);
        dd($result);
    }
}
