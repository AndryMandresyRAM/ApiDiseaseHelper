<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:fully:epidemic"})
     */
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $PopulationNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $Pib;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Epidemic", inversedBy="countries")
     */
    private $EpidemicId;

    public function __construct()
    {
        $this->EpidemicId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPopulationNumber(): ?int
    {
        return $this->PopulationNumber;
    }

    public function setPopulationNumber(int $PopulationNumber): self
    {
        $this->PopulationNumber = $PopulationNumber;

        return $this;
    }

    public function getPib(): ?int
    {
        return $this->Pib;
    }

    public function setPib(int $Pib): self
    {
        $this->Pib = $Pib;

        return $this;
    }

    /**
     * @return Collection|Epidemic[]
     */
    public function getEpidemicId(): Collection
    {
        return $this->EpidemicId;
    }

    public function addEpidemicId(Epidemic $epidemicId): self
    {
        if (!$this->EpidemicId->contains($epidemicId)) {
            $this->EpidemicId[] = $epidemicId;
        }

        return $this;
    }

    public function removeEpidemicId(Epidemic $epidemicId): self
    {
        if ($this->EpidemicId->contains($epidemicId)) {
            $this->EpidemicId->removeElement($epidemicId);
        }

        return $this;
    }
}
