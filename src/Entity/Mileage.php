<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MileageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=MileageRepository::class)
 */
class Mileage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometres;

    /**
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="mileage")
     */
    private $ads;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minKm;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxKm;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKilometres(): ?int
    {
        return $this->kilometres;
    }

    public function setKilometres(int $kilometres): self
    {
        $this->kilometres = $kilometres;

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setMileage($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getMileage() === $this) {
                $ad->setMileage(null);
            }
        }

        return $this;
    }

    public function getIsFit(): ?bool
    {
        return $this->isFit;
    }

    public function setIsFit(?bool $isFit): self
    {
        $this->isFit = $isFit;

        return $this;
    }

    public function getMinKm(): ?int
    {
        return $this->minKm;
    }

    public function setMinKm(?int $minKm): self
    {
        $this->minKm = $minKm;

        return $this;
    }

    public function getMaxKm(): ?int
    {
        return $this->maxKm;
    }

    public function setMaxKm(?int $maxKm): self
    {
        $this->maxKm = $maxKm;

        return $this;
    }
}
