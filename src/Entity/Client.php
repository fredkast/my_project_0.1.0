<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nomCLient;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresseClient;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $mailClient;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCLient(): ?string
    {
        return $this->nomCLient;
    }

    public function setNomCLient(string $nomCLient): self
    {
        $this->nomCLient = $nomCLient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresseClient;
    }

    public function setAdresseClient(string $adresseClient): self
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    public function getTelephoneClient(): ?int
    {
        return $this->telephoneClient;
    }

    public function setTelephoneClient(int $telephoneClient): self
    {
        $this->telephoneClient = $telephoneClient;

        return $this;
    }
}
