<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectsDemoRepository")
 */
class ProjectsDemo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Projects", inversedBy="projectsDemos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\DemoLink", inversedBy="projectsDemo", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $link_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjetId(): ?Projects
    {
        return $this->projet_id;
    }

    public function setProjetId(?Projects $projet_id): self
    {
        $this->projet_id = $projet_id;

        return $this;
    }

    public function getLinkId(): ?DemoLink
    {
        return $this->link_id;
    }

    public function setLinkId(DemoLink $link_id): self
    {
        $this->link_id = $link_id;

        return $this;
    }
}
