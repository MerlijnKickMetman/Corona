<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRepository")
 */
class Factuur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $factuurDatum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $vervalDatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $inzakeOpdracht;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $korting;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     */
    private $klantNummer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurRegel", mappedBy="factuurNummer")
     */
    private $factuurRegels;

    public function __construct()
    {
        $this->factuurRegels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurDatum(): ?\DateTimeInterface
    {
        return $this->factuurDatum;
    }

    public function setFactuurDatum(\DateTimeInterface $factuurDatum): self
    {
        $this->factuurDatum = $factuurDatum;

        return $this;
    }

    public function getVervalDatum(): ?\DateTimeInterface
    {
        return $this->vervalDatum;
    }

    public function setVervalDatum(\DateTimeInterface $vervalDatum): self
    {
        $this->vervalDatum = $vervalDatum;

        return $this;
    }

    public function getInzakeOpdracht(): ?string
    {
        return $this->inzakeOpdracht;
    }

    public function setInzakeOpdracht(string $inzakeOpdracht): self
    {
        $this->inzakeOpdracht = $inzakeOpdracht;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->korting;
    }

    public function setKorting(string $korting): self
    {
        $this->korting = $korting;

        return $this;
    }

    public function getKlantNummer(): ?Klant
    {
        return $this->klantNummer;
    }

    public function setKlantNummer(?Klant $klantNummer): self
    {
        $this->klantNummer = $klantNummer;

        return $this;
    }

    /**
     * @return Collection|FactuurRegel[]
     */
    public function getFactuurRegels(): Collection
    {
        return $this->factuurRegels;
    }

    public function addFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if (!$this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels[] = $factuurRegel;
            $factuurRegel->setFactuurNummer($this);
        }

        return $this;
    }

    public function removeFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if ($this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels->removeElement($factuurRegel);
            // set the owning side to null (unless already changed)
            if ($factuurRegel->getFactuurNummer() === $this) {
                $factuurRegel->setFactuurNummer(null);
            }
        }

        return $this;
    }
}
