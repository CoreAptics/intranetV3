<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrelloTacheRepository")
 */
class TrelloTache extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deadline;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnel", inversedBy="trelloTaches")
     */
    private $personnels;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formation", inversedBy="trelloTaches")
     */
    private $formation;

    /**
     * TrelloTache constructor.
     *
     * @param Formation $formation
     */
    public function __construct(Formation $formation)
    {
        $this->formation = $formation;
        $this->personnels = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     *
     * @return TrelloTache
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    /**
     * @param \DateTimeInterface $deadline
     *
     * @return TrelloTache
     */
    public function setDeadline(\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    /**
     * @param Personnel $personnel
     *
     * @return TrelloTache
     */
    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
        }

        return $this;
    }

    /**
     * @param Personnel $personnel
     *
     * @return TrelloTache
     */
    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->contains($personnel)) {
            $this->personnels->removeElement($personnel);
        }

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return TrelloTache
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Formation|null
     */
    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    /**
     * @param Formation|null $formation
     *
     * @return TrelloTache
     */
    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
