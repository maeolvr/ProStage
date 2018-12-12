<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
    private $Libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Stage", inversedBy="idFormation")
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

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(?string $Libelle): self
    {
        $this->Libelle = $Libelle;

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
        }

        return $this;
    }

    public function removeIdStage(Stage $idStage): self
    {
        if ($this->idStage->contains($idStage)) {
            $this->idStage->removeElement($idStage);
        }

        return $this;
    }
}
