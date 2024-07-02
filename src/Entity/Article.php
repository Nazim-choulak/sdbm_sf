<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Stmt\TryCatch;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $Prix_Achat = null;

    #[ORM\Column]
    private ?int $volume = null;

    #[ORM\Column]
    private ?float $titrage = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Marque $marques = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Couleur $couleurs = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?TypeBiere $type_biere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->Prix_Achat;
    }

    public function setPrixAchat(float $Prix_Achat): static
    {
        $this->Prix_Achat = $Prix_Achat;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function getTitrage(): ?float
    {
        return $this->titrage;
    }

    public function setTitrage(float $titrage): static
    {
        $this->titrage = $titrage;

        return $this;
    }

    public function getMarques(): ?Marque
    {
        return $this->marques;
    }

    public function setMarques(?Marque $marques): static
    {
        $this->marques = $marques;

        return $this;
    }

    public function getCouleurs(): ?Couleur
    {
        return $this->couleurs;
    }

    public function setCouleurs(?Couleur $couleurs): static
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getTypeBiere(): ?TypeBiere
    {
        return $this->type_biere;
    }

    public function setTypeBiere(?TypeBiere $type_biere): static
    {
        $this->type_biere = $type_biere;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
