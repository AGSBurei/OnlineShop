<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $codeFacture;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderList", mappedBy="facture")
     */
    private $orderlists;

    public function __construct()
    {
        $this->orderlists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeFacture(): ?string
    {
        return $this->codeFacture;
    }

    public function setCodeFacture(string $codeFacture): self
    {
        $this->codeFacture = $codeFacture;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|OrderList[]
     */
    public function getOrderlists(): Collection
    {
        return $this->orderlists;
    }

    public function addOrderlist(OrderList $orderlist): self
    {
        if (!$this->orderlists->contains($orderlist)) {
            $this->orderlists[] = $orderlist;
            $orderlist->setFacture($this);
        }

        return $this;
    }

    public function removeOrderlist(OrderList $orderlist): self
    {
        if ($this->orderlists->contains($orderlist)) {
            $this->orderlists->removeElement($orderlist);
            // set the owning side to null (unless already changed)
            if ($orderlist->getFacture() === $this) {
                $orderlist->setFacture(null);
            }
        }

        return $this;
    }
}
