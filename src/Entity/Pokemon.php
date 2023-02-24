<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column]
    private int $pokedexNumber;

    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    #[ORM\Column(length: 255)]
    private string $imageUrl;

    #[ORM\Column(length: 255)]
    private string $soundUrl;

    #[ORM\ManyToOne(inversedBy: 'pokemon')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Generation $generation = null;

    public function __construct(
        string $name,
        int $pokedexNumber,
        string $description,
        string $imageUrl,
        string $soundUrl
    ) {
        $this->name             = $name;
        $this->pokedexNumber    = $pokedexNumber;
        $this->description      = $description;
        $this->imageUrl         = $imageUrl;
        $this->soundUrl         = $soundUrl;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPokedexNumber(): int
    {
        return $this->pokedexNumber;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    public function getSoundUrl(): string
    {
        return $this->soundUrl;
    }

    public function getGeneration(): ?Generation
    {
        return $this->generation;
    }

    public function setGeneration(?Generation $generation): self
    {
        $this->generation = $generation;

        return $this;
    }
}
