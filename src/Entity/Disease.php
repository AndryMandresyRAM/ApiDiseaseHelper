<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiseaseRepository")
 * 
 * @ApiResource(
 *      normalizationContext = {"groups"={"read:disease"}},
 *      collectionOperations={
 *          "get",
 *          "post"={
 *              "security"="is_granted('ROLE_ADMIN')"
 *          },
 *      },
 *      itemOperations={
 *          "get",
 *          "put"={
 *              "security"="is_granted('ROLE_ADMIN')"
 *          },
 *          "delete"={
 *              "security"="is_granted('ROLE_ADMIN')"
 *          }
 *      },
 *      paginationItemsPerPage=10
 * )
 */
class Disease
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read:disease"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:fully:epidemic", "read:disease"})
     */
    private $ScientificName;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read:disease"})
     */
    private $YearDiscovery;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:disease"})
     */
    private $Propagation;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:disease"})
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:disease"})
     */
    private $Treatements;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:disease"})
     */
    private $Symptoms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Epidemic", mappedBy="DiseaseId", orphanRemoval=true)
     */
    private $epidemics;

    public function __construct()
    {
        $this->epidemics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScientificName(): ?string
    {
        return $this->ScientificName;
    }

    public function setScientificName(string $ScientificName): self
    {
        $this->ScientificName = $ScientificName;

        return $this;
    }

    public function getYearDiscovery(): ?\DateTimeInterface
    {
        return $this->YearDiscovery;
    }

    public function setYearDiscovery(\DateTimeInterface $YearDiscovery): self
    {
        $this->YearDiscovery = $YearDiscovery;

        return $this;
    }

    public function getPropagation(): ?string
    {
        return $this->Propagation;
    }

    public function setPropagation(string $Propagation): self
    {
        $this->Propagation = $Propagation;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->Type;
    }

    public function setType(int $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getTreatements(): ?string
    {
        return $this->Treatements;
    }

    public function setTreatements(string $Treatements): self
    {
        $this->Treatements = $Treatements;

        return $this;
    }

    public function getSymptoms(): ?string
    {
        return $this->Symptoms;
    }

    public function setSymptoms(string $Symptoms): self
    {
        $this->Symptoms = $Symptoms;

        return $this;
    }

    /**
     * @return Collection|Epidemic[]
     */
    public function getEpidemics(): Collection
    {
        return $this->epidemics;
    }

    public function addEpidemic(Epidemic $epidemic): self
    {
        if (!$this->epidemics->contains($epidemic)) {
            $this->epidemics[] = $epidemic;
            $epidemic->setDiseaseId($this);
        }

        return $this;
    }

    public function removeEpidemic(Epidemic $epidemic): self
    {
        if ($this->epidemics->contains($epidemic)) {
            $this->epidemics->removeElement($epidemic);
            // set the owning side to null (unless already changed)
            if ($epidemic->getDiseaseId() === $this) {
                $epidemic->setDiseaseId(null);
            }
        }

        return $this;
    }
}
