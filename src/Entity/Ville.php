<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\OneToMany(targetEntity="App\Entity\Billtain", mappedBy="ville")
     */
    private $billtains;

    public function __construct()
    {
        $this->billtains = new ArrayCollection();
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

    /**
     * @return Collection|Billtain[]
     */
    public function getBilltains(): Collection
    {
        return $this->billtains;
    }

    public function addBilltain(Billtain $billtain): self
    {
        if (!$this->billtains->contains($billtain)) {
            $this->billtains[] = $billtain;
            $billtain->setVille($this);
        }

        return $this;
    }

    public function removeBilltain(Billtain $billtain): self
    {
        if ($this->billtains->contains($billtain)) {
            $this->billtains->removeElement($billtain);
            // set the owning side to null (unless already changed)
            if ($billtain->getVille() === $this) {
                $billtain->setVille(null);
            }
        }

        return $this;
    }
}
