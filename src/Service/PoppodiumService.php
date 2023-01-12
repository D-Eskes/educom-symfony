<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Poppodium;


class PoppodiumService {

    private $artiestRepository;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->poppodiumRepository = $em->getRepository(Poppodium::class);
    }

    public function savePoppodium($params) 
    {   
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "naam" => $params["naam"],
            "adres" => $params["adres"],
            "postcode" => $params["postcode"],
            "woonplaats" => $params["woonplaats"],
            "telefoonnummer" => $params["telefoonnummer"],
            "email" => $params["email"],
            "website" => $params["website"],
            "afbeelding_url" => $params["afbeelding_url"],              
        ];

        $result = $this->poppodiumRepository->savePoppodium($data);
        return ($result);
    }
}