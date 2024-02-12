<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DescriptionRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DescriptionRepository::class)]

#[ApiResource 
]

class Description
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    // #[Groups(['read:collection'])]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    // #[Groups(['read:collection'])]
    // #[Assert\Length(min:4, max: 250)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    // #[Groups(['read:collection'])]
    // #[Assert\Length(min:4, max: 250)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'descriptions', cascade: ["persist"])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
