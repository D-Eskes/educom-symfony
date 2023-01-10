<?php

namespace App\Entity;

use App\Repository\OptredenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptredenRepository::class)]
class Optreden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Poppodium::class, inversedBy: 'optredens')]
    #[ORM\JoinColumn(nullable: false)]
    private $poppodium;

    #[ORM\ManyToOne(targetEntity: Artiest::class, inversedBy: 'optredens')]
    #[ORM\JoinColumn(nullable: false)]
    private $artiest;

    #[ORM\ManyToOne(targetEntity: Artiest::class, inversedBy: 'vooroptredens')]
    private $voorprogramma;

    #[ORM\Column(type: 'string', length: 255)]
    private $omschrijving;

    #[ORM\Column(type: 'datetime')]
    private $datum;

    #[ORM\Column(type: 'integer')]
    private $prijs;

    #[ORM\Column(type: 'string', length: 255)]
    private $ticket_url;

    #[ORM\Column(type: 'string', length: 255)]
    private $afbeelding_url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoppodium(): ?Poppodium
    {
        return $this->poppodium;
    }

    public function setPoppodium(?Poppodium $poppodium): self
    {
        $this->poppodium = $poppodium;

        return $this;
    }

    public function getArtiest(): ?Artiest
    {
        return $this->artiest;
    }

    public function setArtiest(?Artiest $artiest): self
    {
        $this->artiest = $artiest;

        return $this;
    }

    public function getVoorprogramma(): ?Artiest
    {
        return $this->voorprogramma;
    }

    public function setVoorprogramma(?Artiest $voorprogramma): self
    {
        $this->voorprogramma = $voorprogramma;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->prijs;
    }

    public function setPrijs(int $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function getTicketUrl(): ?string
    {
        return $this->ticket_url;
    }

    public function setTicketUrl(string $ticket_url): self
    {
        $this->ticket_url = $ticket_url;

        return $this;
    }

    public function getAfbeeldingUrl(): ?string
    {
        return $this->afbeelding_url;
    }

    public function setAfbeeldingUrl(string $afbeelding_url): self
    {
        $this->afbeelding_url = $afbeelding_url;

        return $this;
    }

}
