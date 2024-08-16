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

    #[ORM\ManyToOne(inversedBy: 'matchesHome')]
    private ?Team $homeTeam = null;

    #[ORM\ManyToOne(inversedBy: 'matchesAway')]
    private ?Team $awayTeam = null;

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

    public function getHomeTeam(): ?Team
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Team $homeTeam): static
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function getAwayTeam(): ?Team
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?Team $awayTeam): static
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }
}
