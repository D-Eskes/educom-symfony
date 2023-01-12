<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artiest;


class ArtiestService {

    private $artiestRepository;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->artiestRepository = $em->getRepository(Artiest::class);
    }

    public function saveArtiest($params) 
    {   
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "naam" => $params["naam"],
            "genre" => $params["genre"],
            "omschrijving" => $params["omschrijving"],
            "website" => $params["website"],
            "afbeelding_url" => $params["afbeelding_url"],              
        ];

        $result = $this->artiestRepository->saveArtiest($data);
        return ($result);
    }
}