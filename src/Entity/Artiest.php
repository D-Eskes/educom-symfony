<?php

namespace App\Entity;

use App\Repository\ArtiestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtiestRepository::class)]
class Artiest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $naam;

    #[ORM\Column(type: 'string', length: 59)]
    private $genre;

    #[ORM\Column(type: 'string', length: 255)]
    private $omschrijving;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $website;

    #[ORM\OneToMany(mappedBy: 'artiest', targetEntity: Optreden::class)]
    private $optredens;

    #[ORM\OneToMany(mappedBy: 'voorprogramma', targetEntity: Optreden::class)]
    private $vooroptredens;

    #[ORM\Column(type: 'string', length: 255)]
    private $afbeelding_url;

    public function __construct()
    {
        $this->optredens = new ArrayCollection();
        $this->vooroptredens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getOptredens(): Collection
    {
        return $this->optredens;
    }

    public function addOptreden(Optreden $optreden): self
    {
        if (!$this->optredens->contains($optreden)) {
            $this->optredens[] = $optreden;
            $optreden->setArtiest($this);
        }

        return $this;
    }

    public function removeOptreden(Optreden $optreden): self
    {
        if ($this->optredens->removeElement($optreden)) {
            // set the owning side to null (unless already changed)
            if ($optreden->getArtiest() === $this) {
                $optreden->setArtiest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getVooroptredens(): Collection
    {
        return $this->vooroptredens;
    }

    public function addVooroptreden(Optreden $vooroptreden): self
    {
        if (!$this->vooroptredens->contains($vooroptreden)) {
            $this->vooroptredens[] = $vooroptreden;
            $vooroptreden->setVoorprogramma($this);
        }

        return $this;
    }

    public function removeVooroptreden(Optreden $vooroptreden): self
    {
        if ($this->vooroptredens->removeElement($vooroptreden)) {
            // set the owning side to null (unless already changed)
            if ($vooroptreden->getVoorprogramma() === $this) {
                $vooroptreden->setVoorprogramma(null);
            }
        }

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
