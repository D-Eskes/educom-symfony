<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Optreden;
use App\Entity\Artiest;
use App\Entity\Poppodium;

/**
 * @Route("/optreden")
 */
class OptredenController extends AbstractController
{
 
    /**
     * @Route("/save", name="optreden_save")
     */
    public function saveOptreden() {

        $rep = $this->getDoctrine()->getRepository(Optreden::class);
        /// Ook hier weer een kleine simulatie van een "POST" request
        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 1, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $rep->saveOptreden($optreden);
        dd($result);
    }




}