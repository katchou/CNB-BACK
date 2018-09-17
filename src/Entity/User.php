<?php

namespace App\Entity;

use Gedmo\Timestampable\Traits\TimestampableEntity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeCertificatMedical;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Statut", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\UserAdresse", mappedBy="user", cascade={"persist", "remove"})
     */
    private $userAdresse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserMail", mappedBy="user", orphanRemoval=true)
     */
    private $userMails;

    public function __construct()
    {
        $this->userMails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getDateDeCertificatMedical(): ?\DateTimeInterface
    {
        return $this->dateDeCertificatMedical;
    }

    public function setDateDeCertificatMedical(\DateTimeInterface $dateDeCertificatMedical): self
    {
        $this->dateDeCertificatMedical = $dateDeCertificatMedical;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUserAdresse(): ?UserAdresse
    {
        return $this->userAdresse;
    }

    public function setUserAdresse(UserAdresse $userAdresse): self
    {
        $this->userAdresse = $userAdresse;

        // set the owning side of the relation if necessary
        if ($this !== $userAdresse->getUser()) {
            $userAdresse->setUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|UserMail[]
     */
    public function getUserMails(): Collection
    {
        return $this->userMails;
    }

    public function addUserMail(UserMail $userMail): self
    {
        if (!$this->userMails->contains($userMail)) {
            $this->userMails[] = $userMail;
            $userMail->setUser($this);
        }

        return $this;
    }

    public function removeUserMail(UserMail $userMail): self
    {
        if ($this->userMails->contains($userMail)) {
            $this->userMails->removeElement($userMail);
            // set the owning side to null (unless already changed)
            if ($userMail->getUser() === $this) {
                $userMail->setUser(null);
            }
        }

        return $this;
    }
}
