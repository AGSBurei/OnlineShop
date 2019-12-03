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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gender", inversedBy="products")
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="products")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Material", inversedBy="products")
     */
    private $material;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Color", inversedBy="products")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shape", inversedBy="products")
     */
    private $shape;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Style", mappedBy="products")
     */
    private $styles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MountType", inversedBy="products")
     */
    private $mountType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OrderList", mappedBy="products")
     */
    private $orderLists;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
        $this->orderLists = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getMaterial(): ?Material
    {
        return $this->material;
    }

    public function setMaterial(?Material $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getShape(): ?Shape
    {
        return $this->shape;
    }

    public function setShape(?Shape $shape): self
    {
        $this->shape = $shape;

        return $this;
    }

    /**
     * @return Collection|Style[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
            $style->addProduct($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        if ($this->styles->contains($style)) {
            $this->styles->removeElement($style);
            $style->removeProduct($this);
        }

        return $this;
    }

    public function getMountType(): ?MountType
    {
        return $this->mountType;
    }

    public function setMountType(?MountType $mountType): self
    {
        $this->mountType = $mountType;

        return $this;
    }

    /**
     * @return Collection|OrderList[]
     */
    public function getOrderLists(): Collection
    {
        return $this->orderLists;
    }

    public function addOrderList(OrderList $orderList): self
    {
        if (!$this->orderLists->contains($orderList)) {
            $this->orderLists[] = $orderList;
            $orderList->addProduct($this);
        }

        return $this;
    }

    public function removeOrderList(OrderList $orderList): self
    {
        if ($this->orderLists->contains($orderList)) {
            $this->orderLists->removeElement($orderList);
            $orderList->removeProduct($this);
        }

        return $this;
    }

}
