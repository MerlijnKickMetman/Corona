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
     */
    private $factuurNummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="factuurRegels")
     */
    private $productCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $productAantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurNummer(): ?Factuur
    {
        return $this->factuurNummer;
    }

    public function setFactuurNummer(?Factuur $factuurNummer): self
    {
        $this->factuurNummer = $factuurNummer;

        return $this;
    }

    public function getProductCode(): ?Product
    {
        return $this->productCode;
    }

    public function setProductCode(?Product $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getProductAantal(): ?int
    {
        return $this->productAantal;
    }

    public function setProductAantal(int $productAantal): self
    {
        $this->productAantal = $productAantal;

        return $this;
    }
}
