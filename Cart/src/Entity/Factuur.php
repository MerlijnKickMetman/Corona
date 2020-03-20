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
     * @ORM\ManyToOne(targetEntity="App\Entity\Klant", inversedBy="factuurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $KlantNummer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $FactuurDatum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $VervalDatum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $InzakeOpdracht;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Korting;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurRegel", mappedBy="FactuurNummer")
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

    public function getKlantNummer(): ?Klant
    {
        return $this->KlantNummer;
    }

    public function setKlantNummer(?Klant $KlantNummer): self
    {
        $this->KlantNummer = $KlantNummer;

        return $this;
    }

    public function getFactuurDatum(): ?\DateTimeInterface
    {
        return $this->FactuurDatum;
    }

    public function setFactuurDatum(\DateTimeInterface $FactuurDatum): self
    {
        $this->FactuurDatum = $FactuurDatum;

        return $this;
    }

    public function getVervalDatum(): ?\DateTimeInterface
    {
        return $this->VervalDatum;
    }

    public function setVervalDatum(\DateTimeInterface $VervalDatum): self
    {
        $this->VervalDatum = $VervalDatum;

        return $this;
    }

    public function getInzakeOpdracht(): ?string
    {
        return $this->InzakeOpdracht;
    }

    public function setInzakeOpdracht(string $InzakeOpdracht): self
    {
        $this->InzakeOpdracht = $InzakeOpdracht;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->Korting;
    }

    public function setKorting(string $Korting): self
    {
        $this->Korting = $Korting;

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
