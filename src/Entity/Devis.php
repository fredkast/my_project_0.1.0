<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DevisRepository::class)
 */
class Devis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typeMaison;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $typeUsage;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $budget;

    /**
     * @ORM\Column(type="integer")
     */
    private $etages;

    /**
     * @ORM\Column(type="integer")
     */
    private $chambres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $exterieur;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="devis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMaison(): ?string
    {
        return $this->typeMaison;
    }

    public function setTypeMaison(string $typeMaison): self
    {
        $this->typeMaison = $typeMaison;

        return $this;
    }

    public function getTypeUsage(): ?string
    {
        return $this->typeUsage;
    }

    public function setTypeUsage(string $typeUsage): self
    {
        $this->typeUsage = $typeUsage;

        return $this;
    }

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getEtages(): ?int
    {
        return $this->etages;
    }

    public function setEtages(int $etages): self
    {
        $this->etages = $etages;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): self
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getExterieur(): ?bool
    {
        return $this->exterieur;
    }

    public function setExterieur(bool $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
