<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsRepository")
 */
class Projects
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProjectsDemo", mappedBy="projet_id", orphanRemoval=true)
     */
    private $projectsDemos;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProjectsContext", mappedBy="projects")
     */
    private $context;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProjectsImages", mappedBy="project")
     */
    private $projectsImages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProjectsCode", mappedBy="project")
     */
    private $projectsCodes;

    public function __construct()
    {
        $this->projectsDemos = new ArrayCollection();
        $this->context = new ArrayCollection();
        $this->projectsImages = new ArrayCollection();
        $this->projectsCodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|ProjectsDemo[]
     */
    public function getProjectsDemos(): Collection
    {
        return $this->projectsDemos;
    }

    public function addProjectsDemo(ProjectsDemo $projectsDemo): self
    {
        if (!$this->projectsDemos->contains($projectsDemo)) {
            $this->projectsDemos[] = $projectsDemo;
            $projectsDemo->setProjetId($this);
        }

        return $this;
    }

    public function removeProjectsDemo(ProjectsDemo $projectsDemo): self
    {
        if ($this->projectsDemos->contains($projectsDemo)) {
            $this->projectsDemos->removeElement($projectsDemo);
            // set the owning side to null (unless already changed)
            if ($projectsDemo->getProjetId() === $this) {
                $projectsDemo->setProjetId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProjectsContext[]
     */
    public function getContext(): Collection
    {
        return $this->context;
    }

    public function addContext(ProjectsContext $context): self
    {
        if (!$this->context->contains($context)) {
            $this->context[] = $context;
            $context->addProject($this);
        }

        return $this;
    }

    public function removeContext(ProjectsContext $context): self
    {
        if ($this->context->contains($context)) {
            $this->context->removeElement($context);
            $context->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|ProjectsImages[]
     */
    public function getProjectsImages(): Collection
    {
        return $this->projectsImages;
    }

    public function addProjectsImage(ProjectsImages $projectsImage): self
    {
        if (!$this->projectsImages->contains($projectsImage)) {
            $this->projectsImages[] = $projectsImage;
            $projectsImage->setProject($this);
        }

        return $this;
    }

    public function removeProjectsImage(ProjectsImages $projectsImage): self
    {
        if ($this->projectsImages->contains($projectsImage)) {
            $this->projectsImages->removeElement($projectsImage);
            // set the owning side to null (unless already changed)
            if ($projectsImage->getProject() === $this) {
                $projectsImage->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProjectsCode[]
     */
    public function getProjectsCodes(): Collection
    {
        return $this->projectsCodes;
    }

    public function addProjectsCode(ProjectsCode $projectsCode): self
    {
        if (!$this->projectsCodes->contains($projectsCode)) {
            $this->projectsCodes[] = $projectsCode;
            $projectsCode->setProject($this);
        }

        return $this;
    }

    public function removeProjectsCode(ProjectsCode $projectsCode): self
    {
        if ($this->projectsCodes->contains($projectsCode)) {
            $this->projectsCodes->removeElement($projectsCode);
            // set the owning side to null (unless already changed)
            if ($projectsCode->getProject() === $this) {
                $projectsCode->setProject(null);
            }
        }

        return $this;
    }
}
