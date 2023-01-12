<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Optreden;
use App\Entity\Artiest;
use App\Entity\Poppodium;

class OptredenService {

    private $optredenRepository;
    private $artiestRepository;
    private $poppodiumRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->optredenRepository = $em->getRepository(Optreden::class);
        $this->artiestRepository = $em->getRepository(Artiest::class);
        $this->poppodiumRepository = $em->getRepository(Poppodium::class);
    }

    private function fetchArtiest($id = null) {
        if (is_null($id)) {
            return (null);
        }
        return ($this->artiestRepository->fetchArtiest($id));
    }

    private function fetchPoppodium($id) {
        return ($this->poppodiumRepository->fetchPoppodium($id));
    }

    public function saveOptreden($params) {
        $data = [
            "id" => (isset($params["id"]) && $params["id"] != "") ? $params["id"] : null,
            "omschrijving" => $params["omschrijving"],
            "datum" => new \DateTime($params["datum"]),
            "prijs" => $params["prijs"],
            "ticket_url" => $params["ticket_url"],
            "afbeelding_url" => $params["afbeelding_url"],              
            "poppodium" => $this->fetchPoppodium($params["poppodium_id"]),
            "voorprogramma" => $this->fetchArtiest($params["voorprogramma_id"]),
            "hoofdprogramma" => $this->fetchArtiest($params["hoofdprogramma_id"])
        ];

        $result = $this->optredenRepository->saveOptreden($data);
        return ($result);
    }
}