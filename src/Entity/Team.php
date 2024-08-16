<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(nullable: true)]
    private ?int $yearOfCreation = null;

    #[ORM\Column(length: 255)]
    private ?string $president = null;

    #[ORM\Column(length: 255)]
    private ?string $coach = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'team')]
    private Collection $players;

    /**
     * @var Collection<int, MatchTeams>
     */
    #[ORM\OneToMany(targetEntity: MatchTeams::class, mappedBy: 'homeTeam')]
    private Collection $matchesHome;

    /**
     * @var Collection<int, MatchTeams>
     */
    #[ORM\OneToMany(targetEntity: MatchTeams::class, mappedBy: 'awayTeam')]
    private Collection $matchesAway;

    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->matchesHome = new ArrayCollection();
        $this->matchesAway = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getYearOfCreation(): ?int
    {
        return $this->yearOfCreation;
    }

    public function setYearOfCreation(?int $yearOfCreation): static
    {
        $this->yearOfCreation = $yearOfCreation;

        return $this;
    }

    public function getPresident(): ?string
    {
        return $this->president;
    }

    public function setPresident(string $president): static
    {
        $this->president = $president;

        return $this;
    }

    public function getCoach(): ?string
    {
        return $this->coach;
    }

    public function setCoach(string $coach): static
    {
        $this->coach = $coach;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchTeams>
     */
    public function getMatchesHome(): Collection
    {
        return $this->matchesHome;
    }

    public function addMatchesHome(MatchTeams $matchesHome): static
    {
        if (!$this->matchesHome->contains($matchesHome)) {
            $this->matchesHome->add($matchesHome);
            $matchesHome->setHomeTeam($this);
        }

        return $this;
    }

    public function removeMatchesHome(MatchTeams $matchesHome): static
    {
        if ($this->matchesHome->removeElement($matchesHome)) {
            // set the owning side to null (unless already changed)
            if ($matchesHome->getHomeTeam() === $this) {
                $matchesHome->setHomeTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchTeams>
     */
    public function getMatchesAway(): Collection
    {
        return $this->matchesAway;
    }

    public function addMatchesAway(MatchTeams $matchesAway): static
    {
        if (!$this->matchesAway->contains($matchesAway)) {
            $this->matchesAway->add($matchesAway);
            $matchesAway->setAwayTeam($this);
        }

        return $this;
    }

    public function removeMatchesAway(MatchTeams $matchesAway): static
    {
        if ($this->matchesAway->removeElement($matchesAway)) {
            // set the owning side to null (unless already changed)
            if ($matchesAway->getAwayTeam() === $this) {
                $matchesAway->setAwayTeam(null);
            }
        }

        return $this;
    }
}
