<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantRepository")
 */
class Klant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $KlantNaam;

    /**
     * @ORM\Column(type="integer")
     */
    private $BtwNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Plaats;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Postcode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuur", mappedBy="KlantNummer")
     */
    private $factuurs;

    public function __construct()
    {
        $this->factuurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlantNaam(): ?string
    {
        return $this->KlantNaam;
    }

    public function setKlantNaam(string $KlantNaam): self
    {
        $this->KlantNaam = $KlantNaam;

        return $this;
    }

    public function getBtwNummer(): ?int
    {
        return $this->BtwNummer;
    }

    public function setBtwNummer(int $BtwNummer): self
    {
        $this->BtwNummer = $BtwNummer;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->Plaats;
    }

    public function setPlaats(string $Plaats): self
    {
        $this->Plaats = $Plaats;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->Postcode;
    }

    public function setPostcode(string $Postcode): self
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    /**
     * @return Collection|Factuur[]
     */
    public function getFactuurs(): Collection
    {
        return $this->factuurs;
    }

    public function addFactuur(Factuur $factuur): self
    {
        if (!$this->factuurs->contains($factuur)) {
            $this->factuurs[] = $factuur;
            $factuur->setKlantNummer($this);
        }

        return $this;
    }

    public function removeFactuur(Factuur $factuur): self
    {
        if ($this->factuurs->contains($factuur)) {
            $this->factuurs->removeElement($factuur);
            // set the owning side to null (unless already changed)
            if ($factuur->getKlantNummer() === $this) {
                $factuur->setKlantNummer(null);
            }
        }

        return $this;
    }
}
