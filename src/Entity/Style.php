<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StyleRepository::class)]
class Style
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $style = null;

    #[ORM\Column(length: 50)]
    private ?string $origine = null;

    #[ORM\ManyToMany(targetEntity: Tatoueur::class, mappedBy: 'style')]
    private Collection $tatoueurs;

    #[ORM\OneToMany(mappedBy: 'style', targetEntity: Reponses::class)]
    private Collection $reponses;

    public function __construct()
    {
        $this->tatoueurs = new ArrayCollection();
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * @return Collection<int, Tatoueur>
     */
    public function getTatoueurs(): Collection
    {
        return $this->tatoueurs;
    }

    public function addTatoueur(Tatoueur $tatoueur): self
    {
        if (!$this->tatoueurs->contains($tatoueur)) {
            $this->tatoueurs->add($tatoueur);
            $tatoueur->addStyle($this);
        }

        return $this;
    }

    public function removeTatoueur(Tatoueur $tatoueur): self
    {
        if ($this->tatoueurs->removeElement($tatoueur)) {
            $tatoueur->removeStyle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Reponses>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponses $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setStyle($this);
        }

        return $this;
    }

    public function removeReponse(Reponses $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getStyle() === $this) {
                $reponse->setStyle(null);
            }
        }

        return $this;
    }
}
