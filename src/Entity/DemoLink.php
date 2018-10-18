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
     * @ORM\ManyToOne(targetEntity="App\Entity\Projects", inversedBy="demo")
     */
    private $projects;
    

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

    public function getProjects(): ?Projects
    {
        return $this->projects;
    }

    public function setProjects(?Projects $projects): self
    {
        $this->projects = $projects;

        return $this;
    }
}
