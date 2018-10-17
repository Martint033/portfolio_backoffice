<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsContextRepository")
 */
class ProjectsContext
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Projects", inversedBy="context")
     */
    private $projects;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contexte", inversedBy="projectsContexts")
     */
    private $context;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->context = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Projects[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Projects $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
        }

        return $this;
    }

    public function removeProject(Projects $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
        }

        return $this;
    }

    /**
     * @return Collection|Contexte[]
     */
    public function getContext(): Collection
    {
        return $this->context;
    }

    public function addContext(Contexte $context): self
    {
        if (!$this->context->contains($context)) {
            $this->context[] = $context;
        }

        return $this;
    }

    public function removeContext(Contexte $context): self
    {
        if ($this->context->contains($context)) {
            $this->context->removeElement($context);
        }

        return $this;
    }
}
