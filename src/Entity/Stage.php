<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $Mail;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=70, nullable=true)
     */
    private $NomDuContact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="stages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEntreprises;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formation", inversedBy="stages")
     */
    private $idFormations;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->Mail;
    }

    public function setMail(?string $Mail): self
    {
        $this->Mail = $Mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(?string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getNomDuContact(): ?string
    {
        return $this->NomDuContact;
    }

    public function setNomDuContact(?string $NomDuContact): self
    {
        $this->NomDuContact = $NomDuContact;

        return $this;
    }
}
