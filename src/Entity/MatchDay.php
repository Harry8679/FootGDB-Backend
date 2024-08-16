<?php

namespace App\Entity;

use App\Repository\MatchDayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchDayRepository::class)]
class MatchDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dayNumber = null;

    /**
     * @var Collection<int, MatchTeams>
     */
    #[ORM\OneToMany(targetEntity: MatchTeams::class, mappedBy: 'matchDay')]
    private Collection $matches;

    #[ORM\ManyToOne(inversedBy: 'matchDays')]
    private ?Season $season = null;

    public function __construct()
    {
        $this->matches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayNumber(): ?int
    {
        return $this->dayNumber;
    }

    public function setDayNumber(int $dayNumber): static
    {
        $this->dayNumber = $dayNumber;

        return $this;
    }

    /**
     * @return Collection<int, MatchTeams>
     */
    public function getMatches(): Collection
    {
        return $this->matches;
    }

    public function addMatch(MatchTeams $match): static
    {
        if (!$this->matches->contains($match)) {
            $this->matches->add($match);
            $match->setMatchDay($this);
        }

        return $this;
    }

    public function removeMatch(MatchTeams $match): static
    {
        if ($this->matches->removeElement($match)) {
            // set the owning side to null (unless already changed)
            if ($match->getMatchDay() === $this) {
                $match->setMatchDay(null);
            }
        }

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): static
    {
        $this->season = $season;

        return $this;
    }
}
