<?php

namespace App\Entity;

use App\Repository\MatchTeamsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchTeamsRepository::class)]
class MatchTeams
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $homeScore = null;

    #[ORM\Column]
    private ?int $awayScore = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomeScore(): ?int
    {
        return $this->homeScore;
    }

    public function setHomeScore(int $homeScore): static
    {
        $this->homeScore = $homeScore;

        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->awayScore;
    }

    public function setAwayScore(int $awayScore): static
    {
        $this->awayScore = $awayScore;

        return $this;
    }
}
