<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Activite;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Site;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="idEntreprise")
     */
    private $idStage;

    public function __construct()
    {
        $this->idStage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(?string $Activite): self
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->Site;
    }

    public function setSite(?string $Site): self
    {
        $this->Site = $Site;

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getIdStage(): Collection
    {
        return $this->idStage;
    }

    public function addIdStage(Stage $idStage): self
    {
        if (!$this->idStage->contains($idStage)) {
            $this->idStage[] = $idStage;
            $idStage->setIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdStage(Stage $idStage): self
    {
        if ($this->idStage->contains($idStage)) {
            $this->idStage->removeElement($idStage);
            // set the owning side to null (unless already changed)
            if ($idStage->getIdEntreprise() === $this) {
                $idStage->setIdEntreprise(null);
            }
        }

        return $this;
    }
}
