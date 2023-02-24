<?php

namespace App\Entity;

use App\Repository\MapsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapsRepository::class)]
class Maps
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?tatoueur $tatoueur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTatoueur(): ?tatoueur
    {
        return $this->tatoueur;
    }

    public function setTatoueur(tatoueur $tatoueur): self
    {
        $this->tatoueur = $tatoueur;

        return $this;
    }
}
