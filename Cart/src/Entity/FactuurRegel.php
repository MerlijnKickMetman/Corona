<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRegelRepository")
 */
class FactuurRegel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Factuur", inversedBy="factuurRegels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FactuurNummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="factuurRegels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ProductCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductAantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurNummer(): ?Factuur
    {
        return $this->FactuurNummer;
    }

    public function setFactuurNummer(?Factuur $FactuurNummer): self
    {
        $this->FactuurNummer = $FactuurNummer;

        return $this;
    }

    public function getProductCode(): ?Product
    {
        return $this->ProductCode;
    }

    public function setProductCode(?Product $ProductCode): self
    {
        $this->ProductCode = $ProductCode;

        return $this;
    }

    public function getProductAantal(): ?int
    {
        return $this->ProductAantal;
    }

    public function setProductAantal(int $ProductAantal): self
    {
        $this->ProductAantal = $ProductAantal;

        return $this;
    }
}
