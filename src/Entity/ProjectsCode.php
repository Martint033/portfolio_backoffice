<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsCodeRepository")
 */
class ProjectsCode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projects", inversedBy="projectsCodes")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodeLink", mappedBy="projectsCode")
     */
    private $link;

    public function __construct()
    {
        $this->link = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?Projects
    {
        return $this->project;
    }

    public function setProject(?Projects $project): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Collection|CodeLink[]
     */
    public function getLink(): Collection
    {
        return $this->link;
    }

    public function addLink(CodeLink $link): self
    {
        if (!$this->link->contains($link)) {
            $this->link[] = $link;
            $link->setProjectsCode($this);
        }

        return $this;
    }

    public function removeLink(CodeLink $link): self
    {
        if ($this->link->contains($link)) {
            $this->link->removeElement($link);
            // set the owning side to null (unless already changed)
            if ($link->getProjectsCode() === $this) {
                $link->setProjectsCode(null);
            }
        }

        return $this;
    }
}
