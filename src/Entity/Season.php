<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, MatchDay>
     */
    #[ORM\OneToMany(targetEntity: MatchDay::class, mappedBy: 'season')]
    private Collection $matchDays;

    public function __construct()
    {
        $this->matchDays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, MatchDay>
     */
    public function getMatchDays(): Collection
    {
        return $this->matchDays;
    }

    public function addMatchDay(MatchDay $matchDay): static
    {
        if (!$this->matchDays->contains($matchDay)) {
            $this->matchDays->add($matchDay);
            $matchDay->setSeason($this);
        }

        return $this;
    }

    public function removeMatchDay(MatchDay $matchDay): static
    {
        if ($this->matchDays->removeElement($matchDay)) {
            // set the owning side to null (unless already changed)
            if ($matchDay->getSeason() === $this) {
                $matchDay->setSeason(null);
            }
        }

        return $this;
    }
}
