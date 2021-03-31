<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\ManyToOne(targetEntity=Professional::class, inversedBy="garages")
     */
    private $professional;

    /**
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="garage", orphanRemoval=true)
     */
    private $ad;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="garage")
     */
    private $user;

    public function __construct()
    {
        $this->ad = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getProfessional(): ?Professional
    {
        return $this->professional;
    }

    public function setProfessional(?Professional $professional): self
    {
        $this->professional = $professional;

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAd(): Collection
    {
        return $this->ad;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ad->contains($ad)) {
            $this->ad[] = $ad;
            $ad->setGarage($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ad->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getGarage() === $this) {
                $ad->setGarage(null);
            }
        }

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
}
