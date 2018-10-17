<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemoLinkRepository")
 */
class DemoLink
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
    private $demo_link;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ProjectsDemo", mappedBy="link_id", cascade={"persist", "remove"})
     */
    private $projectsDemo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemoLink(): ?string
    {
        return $this->demo_link;
    }

    public function setDemoLink(string $demo_link): self
    {
        $this->demo_link = $demo_link;

        return $this;
    }

    public function getProjectsDemo(): ?ProjectsDemo
    {
        return $this->projectsDemo;
    }

    public function setProjectsDemo(ProjectsDemo $projectsDemo): self
    {
        $this->projectsDemo = $projectsDemo;

        // set the owning side of the relation if necessary
        if ($this !== $projectsDemo->getLinkId()) {
            $projectsDemo->setLinkId($this);
        }

        return $this;
    }
}
