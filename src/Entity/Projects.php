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
     * @ORM\ManyToMany(targetEntity="App\Entity\Contexte", inversedBy="projects")
     */
    private $context;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DemoLink", mappedBy="projects")
     */
    private $demo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodeLink", mappedBy="projects")
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="projects")
     */
    private $images;

    public function __construct()
    {
        $this->context = new ArrayCollection();
        $this->demo = new ArrayCollection();
        $this->code = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    /**
     * @return Collection|DemoLink[]
     */
    public function getDemo(): Collection
    {
        return $this->demo;
    }

    public function addDemo(DemoLink $demo): self
    {
        if (!$this->demo->contains($demo)) {
            $this->demo[] = $demo;
            $demo->setProjects($this);
        }

        return $this;
    }

    public function removeDemo(DemoLink $demo): self
    {
        if ($this->demo->contains($demo)) {
            $this->demo->removeElement($demo);
            // set the owning side to null (unless already changed)
            if ($demo->getProjects() === $this) {
                $demo->setProjects(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CodeLink[]
     */
    public function getCode(): Collection
    {
        return $this->code;
    }

    public function addCode(CodeLink $code): self
    {
        if (!$this->code->contains($code)) {
            $this->code[] = $code;
            $code->setProjects($this);
        }

        return $this;
    }

    public function removeCode(CodeLink $code): self
    {
        if ($this->code->contains($code)) {
            $this->code->removeElement($code);
            // set the owning side to null (unless already changed)
            if ($code->getProjects() === $this) {
                $code->setProjects(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProjects($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProjects() === $this) {
                $image->setProjects(null);
            }
        }

        return $this;
    }

    // to correct the bug : Object of class App\Entity\Projects could not be converted to string
    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
    }
}
