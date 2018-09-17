<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\HoraireCoursRepository")
 */
class HoraireCours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeFin;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDeDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDeFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreParticipants = 0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeCours", inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeCours;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cours", mappedBy="horaireCours")
     */
    private $cours;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LigneEau", inversedBy="horaireCours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ligneEau;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeDebut(): ?\DateTimeInterface
    {
        return $this->dateDeDebut;
    }

    public function setDateDeDebut(\DateTimeInterface $dateDeDebut): self
    {
        $this->dateDeDebut = $dateDeDebut;

        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->dateDeFin;
    }

    public function setDateDeFin(\DateTimeInterface $dateDeFin): self
    {
        $this->dateDeFin = $dateDeFin;

        return $this;
    }

    public function getHeureDeDebut(): ?\DateTimeInterface
    {
        return $this->heureDeDebut;
    }

    public function setHeureDeDebut(\DateTimeInterface $heureDeDebut): self
    {
        $this->heureDeDebut = $heureDeDebut;

        return $this;
    }

    public function getHeureDeFin(): ?\DateTimeInterface
    {
        return $this->heureDeFin;
    }

    public function setHeureDeFin(\DateTimeInterface $heureDeFin): self
    {
        $this->heureDeFin = $heureDeFin;

        return $this;
    }

    public function getNombreParticipants(): ?int
    {
        return $this->nombreParticipants;
    }

    public function setNombreParticipants(int $nombreParticipants): self
    {
        $this->nombreParticipants = $nombreParticipants;

        return $this;
    }

    public function getTypeCours(): ?TypeCours
    {
        return $this->typeCours;
    }

    public function setTypeCours(?TypeCours $typeCours): self
    {
        $this->typeCours = $typeCours;

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setHoraireCours($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->contains($cour)) {
            $this->cours->removeElement($cour);
            // set the owning side to null (unless already changed)
            if ($cour->getHoraireCours() === $this) {
                $cour->setHoraireCours(null);
            }
        }

        return $this;
    }

    public function getLigneEau(): ?LigneEau
    {
        return $this->ligneEau;
    }

    public function setLigneEau(?LigneEau $ligneEau): self
    {
        $this->ligneEau = $ligneEau;

        return $this;
    }
}
