<?php

namespace App\Entity;

use App\Repository\NationalitéRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NationalitéRepository::class)]
class Nationalité
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nationalité = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $flag = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNationalité(): ?string
    {
        return $this->Nationalité;
    }

    public function setNationalité(?string $Nationalité): self
    {
        $this->Nationalité = $Nationalité;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(?string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }
}
