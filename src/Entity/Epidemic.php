<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource
 * (
 *  normalizationContext={"groups"={"read:full:epidemic"}},
 *  attributes = 
 *  {
 *      "order"={"YearEpidemic", "ASC"}
 *  },
 *  itemOperations=
 *  {
 *      "get"
 *  },
 *  collectionOperations=
 *  {
 *      "get"
 *  }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\EpidemicRepository")
 */
class Epidemic
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read:fully:epidemic"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read:fully:epidemic"})
     */
    private $YearEpidemic;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:fully:epidemic"})
     */
    private $NumberRecensedCase;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:fully:epidemic"})
     */
    private $VictimNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Disease", inversedBy="epidemics")
     * @ORM\JoinColumn(nullable=true)
     */
    private $DiseaseId;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Country", mappedBy="EpidemicId")
     */
    private $countries;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearEpidemic(): ?\DateTimeInterface
    {
        return $this->YearEpidemic;
    }

    public function setYearEpidemic(\DateTimeInterface $YearEpidemic): self
    {
        $this->YearEpidemic = $YearEpidemic;

        return $this;
    }

    public function getNumberRecensedCase(): ?int
    {
        return $this->NumberRecensedCase;
    }

    public function setNumberRecensedCase(int $NumberRecensedCase): self
    {
        $this->NumberRecensedCase = $NumberRecensedCase;

        return $this;
    }

    public function getVictimNumber(): ?int
    {
        return $this->VictimNumber;
    }

    public function setVictimNumber(int $VictimNumber): self
    {
        $this->VictimNumber = $VictimNumber;

        return $this;
    }

    public function getDiseaseId(): ?Disease
    {
        return $this->DiseaseId;
    }

    public function setDiseaseId(?Disease $DiseaseId): self
    {
        $this->DiseaseId = $DiseaseId;

        return $this;
    }

    /**
     * @return Collection|Country[]
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $country): self
    {
        if (!$this->countries->contains($country)) {
            $this->countries[] = $country;
            $country->addEpidemicId($this);
        }

        return $this;
    }

    public function removeCountry(Country $country): self
    {
        if ($this->countries->contains($country)) {
            $this->countries->removeElement($country);
            $country->removeEpidemicId($this);
        }

        return $this;
    }
}
