<?php

namespace App\Entity;

use App\Repository\TeamStandingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamStandingRepository::class)]
class TeamStanding
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Team $team = null;

    #[ORM\Column]
    private ?int $played = null;

    #[ORM\Column]
    private ?int $won = null;

    #[ORM\Column]
    private ?int $drawn = null;

    #[ORM\Column]
    private ?int $lost = null;

    // Les buts marqués
    #[ORM\Column]
    private ?int $goalsFor = null;

    // Les buts encaissés
    #[ORM\Column]
    private ?int $goalsAgainst = null;

    // Différences : goal average
    #[ORM\Column]
    private ?int $goalDifference = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getPlayed(): ?int
    {
        return $this->played;
    }

    public function setPlayed(int $played): static
    {
        $this->played = $played;

        return $this;
    }

    public function getWon(): ?int
    {
        return $this->won;
    }

    public function setWon(int $won): static
    {
        $this->won = $won;

        return $this;
    }

    public function getDrawn(): ?int
    {
        return $this->drawn;
    }

    public function setDrawn(int $drawn): static
    {
        $this->drawn = $drawn;

        return $this;
    }

    public function getLost(): ?int
    {
        return $this->lost;
    }

    public function setLost(int $lost): static
    {
        $this->lost = $lost;

        return $this;
    }

    public function getGoalsFor(): ?int
    {
        return $this->goalsFor;
    }

    public function setGoalsFor(int $goalsFor): static
    {
        $this->goalsFor = $goalsFor;

        return $this;
    }

    public function getGoalsAgainst(): ?int
    {
        return $this->goalsAgainst;
    }

    public function setGoalsAgainst(int $goalsAgainst): static
    {
        $this->goalsAgainst = $goalsAgainst;

        return $this;
    }

    public function getGoalDifference(): ?int
    {
        return $this->goalDifference;
    }

    public function setGoalDifference(int $goalDifference): static
    {
        $this->goalDifference = $goalDifference;

        return $this;
    }
}
