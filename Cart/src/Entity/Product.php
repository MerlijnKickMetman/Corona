<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $ProductOmschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductBtw;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $ProductPrijs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurRegel", mappedBy="ProductCode")
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

    public function getProductOmschrijving(): ?string
    {
        return $this->ProductOmschrijving;
    }

    public function setProductOmschrijving(string $ProductOmschrijving): self
    {
        $this->ProductOmschrijving = $ProductOmschrijving;

        return $this;
    }

    public function getProductBtw(): ?int
    {
        return $this->ProductBtw;
    }

    public function setProductBtw(int $ProductBtw): self
    {
        $this->ProductBtw = $ProductBtw;

        return $this;
    }

    public function getProductPrijs(): ?string
    {
        return $this->ProductPrijs;
    }

    public function setProductPrijs(string $ProductPrijs): self
    {
        $this->ProductPrijs = $ProductPrijs;

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
            $factuurRegel->setProductCode($this);
        }

        return $this;
    }

    public function removeFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if ($this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels->removeElement($factuurRegel);
            // set the owning side to null (unless already changed)
            if ($factuurRegel->getProductCode() === $this) {
                $factuurRegel->setProductCode(null);
            }
        }

        return $this;
    }
}
