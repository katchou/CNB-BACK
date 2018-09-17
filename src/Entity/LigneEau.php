<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\LigneEauRepository")
 */
class LigneEau
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HoraireCours", mappedBy="ligneEau")
     */
    private $horaireCours;

    public function __construct()
    {
        $this->horaireCours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|HoraireCours[]
     */
    public function getHoraireCours(): Collection
    {
        return $this->horaireCours;
    }

    public function addHoraireCour(HoraireCours $horaireCour): self
    {
        if (!$this->horaireCours->contains($horaireCour)) {
            $this->horaireCours[] = $horaireCour;
            $horaireCour->setLigneEau($this);
        }

        return $this;
    }

    public function removeHoraireCour(HoraireCours $horaireCour): self
    {
        if ($this->horaireCours->contains($horaireCour)) {
            $this->horaireCours->removeElement($horaireCour);
            // set the owning side to null (unless already changed)
            if ($horaireCour->getLigneEau() === $this) {
                $horaireCour->setLigneEau(null);
            }
        }

        return $this;
    }
}
