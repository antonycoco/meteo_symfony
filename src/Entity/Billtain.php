<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilltainRepository")
 */
class Billtain
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempirature;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Climat", inversedBy="villes")
     */
    private $climat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="billtains")
     */
    private $ville;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->dateModification = new \DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
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

    public function getTempirature(): ?int
    {
        return $this->tempirature;
    }

    public function setTempirature(int $tempirature): self
    {
        $this->tempirature = $tempirature;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClimat(): ?Climat
    {
        return $this->climat;
    }

    public function setClimat(?Climat $climat): self
    {
        $this->climat = $climat;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
