<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $LastName = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column(length: 50)]
    private ?string $position = null;

    #[ORM\Column]
    private ?int $shirtNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDate = null;

    #[ORM\Column(length: 255)]
    private ?string $birthCity = null;

    #[ORM\Column(length: 255)]
    private ?string $countryOfOrigin = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $team = null;

    /**
     * @var Collection<int, Goal>
     */
    #[ORM\OneToMany(targetEntity: Goal::class, mappedBy: 'player')]
    private Collection $goals;

    /**
     * @var Collection<int, Assist>
     */
    #[ORM\OneToMany(targetEntity: Assist::class, mappedBy: 'player')]
    private Collection $assists;

    public function __construct()
    {
        $this->goals = new ArrayCollection();
        $this->assists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): static
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getShirtNumber(): ?int
    {
        return $this->shirtNumber;
    }

    public function setShirtNumber(int $shirtNumber): static
    {
        $this->shirtNumber = $shirtNumber;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): static
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getBirthCity(): ?string
    {
        return $this->birthCity;
    }

    public function setBirthCity(string $birthCity): static
    {
        $this->birthCity = $birthCity;

        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(string $countryOfOrigin): static
    {
        $this->countryOfOrigin = $countryOfOrigin;

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

    /**
     * @return Collection<int, Goal>
     */
    public function getGoals(): Collection
    {
        return $this->goals;
    }

    public function addGoal(Goal $goal): static
    {
        if (!$this->goals->contains($goal)) {
            $this->goals->add($goal);
            $goal->setPlayer($this);
        }

        return $this;
    }

    public function removeGoal(Goal $goal): static
    {
        if ($this->goals->removeElement($goal)) {
            // set the owning side to null (unless already changed)
            if ($goal->getPlayer() === $this) {
                $goal->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Assist>
     */
    public function getAssists(): Collection
    {
        return $this->assists;
    }

    public function addAssist(Assist $assist): static
    {
        if (!$this->assists->contains($assist)) {
            $this->assists->add($assist);
            $assist->setPlayer($this);
        }

        return $this;
    }

    public function removeAssist(Assist $assist): static
    {
        if ($this->assists->removeElement($assist)) {
            // set the owning side to null (unless already changed)
            if ($assist->getPlayer() === $this) {
                $assist->setPlayer(null);
            }
        }

        return $this;
    }
}
