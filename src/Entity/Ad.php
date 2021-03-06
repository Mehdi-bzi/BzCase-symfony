<?php

namespace App\Entity;

use App\Repository\AdRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Api\FilterInterface;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"ad:read"}},
 *     )
 * 
 * @ApiFilter(SearchFilter::class, properties={
 *     "brand": "exact",
 *     "model": "exact",
 *     "gasoline": "exact"
 * }
 * )
 * @ApiFilter(RangeFilter::class, properties={"mileage", "price"})
 * 
 * 
 * @ApiFilter(DateFilter::class, properties={"dateCirculation"})
 * 

 * @ORM\Entity(repositoryClass=AdRepository::class)
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"ad:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ad:read"})
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ad:read"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=500)
     * @Groups({"ad:read"})
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     * @Groups({"ad:read"})
     */
    private $dateCirculation;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"ad:read"})
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="ad")
     * @Groups({"ad:read"})
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="ads")
     * @Groups({"ad:read"})
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Gasoline::class, inversedBy="ads")
     * @Groups({"ad:read"})
     */
    private $gasoline;


    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="ad")
     */
    private $garage;

    /**
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="ads")
     * @Groups({"ad:read"})
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Ad")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"ad:read"})
     */
    private $mileage;

    public function __construct()
    {
        $this->photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateCirculation(): ?\DateTimeInterface
    {
        return $this->dateCirculation;
    }

    public function setDateCirculation(\DateTimeInterface $dateCirculation): self
    {
        $this->dateCirculation = $dateCirculation;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }


    /**
     * @return Collection|Photo[]
     */
    public function getPhoto(): Collection
    {
        return $this->photo;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photo->contains($photo)) {
            $this->photo[] = $photo;
            $photo->setAd($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photo->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getAd() === $this) {
                $photo->setAd(null);
            }
        }

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

    public function getGasoline(): ?Gasoline
    {
        return $this->gasoline;
    }

    public function setGasoline(?Gasoline $gasoline): self
    {
        $this->gasoline = $gasoline;

        return $this;
    }


    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }
}
