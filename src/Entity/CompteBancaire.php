<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $propritetaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropritetaire(): ?string
    {
        return $this->propritetaire;
    }

    public function setPropritetaire(string $propritetaire): static
    {
        $this->propritetaire = $propritetaire;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }
    public function __construct(){
        $this->proprietaire;
        $this->solde;
    }
    public function retirer(float $montant): float{
        if($montant > $this->solde){
            throw new \Exception('Solde insuffisant');
        }else{
            $this->solde -= $montant;
            return $this->solde;
        }
    }
}
