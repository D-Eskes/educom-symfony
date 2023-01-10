<?php

namespace App\Controller;

use App\Entity\Poppodium;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoppodiumController extends AbstractController
{
    #[Route("/poppodium", name: "poppodium")]
    public function index(): Response
    {
        $podium = [
            "naam" => "De Melkweg",
            "adres" => "Lijnbaansgracht 234a",
            "postcode" => "1017PH",
            "woonplaats" => "Amsterdam",
            "telefoonnummer" => "020-5318181",
            "email" => "info@melkweg.nl",
            "website" => "https://melkweg.nl",
            "afbeelding_url" => "https://assets.melkweg.nl/scaled/900x/pages/48a45969-031b-48a4-a882-2d3408f2d631/bezoekersinfo.png",
        ];

        $repository = $this->getDoctrine()->getRepository(Poppodium::class);
        $result = $repository->savePodium($podium);
        dd($result);
    }

    
}
