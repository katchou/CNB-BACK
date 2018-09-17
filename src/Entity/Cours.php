<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CoursRepository")
 */
class Cours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitImage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HoraireCours", inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $horaireCours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Seance", mappedBy="cours", orphanRemoval=true)
     */
    private $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDroitImage(): ?bool
    {
        return $this->droitImage;
    }

    public function setDroitImage(bool $droitImage): self
    {
        $this->droitImage = $droitImage;

        return $this;
    }

    public function getPaiement(): ?bool
    {
        return $this->paiement;
    }

    public function setPaiement(bool $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getHoraireCours(): ?HoraireCours
    {
        return $this->horaireCours;
    }

    public function setHoraireCours(?HoraireCours $horaireCours): self
    {
        $this->horaireCours = $horaireCours;

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setCours($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->contains($seance)) {
            $this->seances->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getCours() === $this) {
                $seance->setCours(null);
            }
        }

        return $this;
    }
}
