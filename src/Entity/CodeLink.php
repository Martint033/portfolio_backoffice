<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CodeLinkRepository")
 */
class CodeLink
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
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProjectsCode", inversedBy="link")
     */
    private $projectsCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getProjectsCode(): ?ProjectsCode
    {
        return $this->projectsCode;
    }

    public function setProjectsCode(?ProjectsCode $projectsCode): self
    {
        $this->projectsCode = $projectsCode;

        return $this;
    }
}
