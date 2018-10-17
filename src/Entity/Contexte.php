<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContexteRepository")
 */
class Contexte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_fin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProjectsContext", mappedBy="context")
     */
    private $projectsContexts;

    public function __construct()
    {
        $this->projectsContexts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * @return Collection|ProjectsContext[]
     */
    public function getProjectsContexts(): Collection
    {
        return $this->projectsContexts;
    }

    public function addProjectsContext(ProjectsContext $projectsContext): self
    {
        if (!$this->projectsContexts->contains($projectsContext)) {
            $this->projectsContexts[] = $projectsContext;
            $projectsContext->addContext($this);
        }

        return $this;
    }

    public function removeProjectsContext(ProjectsContext $projectsContext): self
    {
        if ($this->projectsContexts->contains($projectsContext)) {
            $this->projectsContexts->removeElement($projectsContext);
            $projectsContext->removeContext($this);
        }

        return $this;
    }
}
