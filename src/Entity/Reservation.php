<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $arrivee = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $depart = null;

    #[ORM\Column]
    private ?int $nombre_voyageurs = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Voyageur $voyageur = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Paiement $paiement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivee(): ?\DateTimeInterface
    {
        return $this->arrivee;
    }

    public function setArrivee(\DateTimeInterface $arrivee): self
    {
        $this->arrivee = $arrivee;

        return $this;
    }

    public function getDepart(): ?\DateTimeInterface
    {
        return $this->depart;
    }

    public function setDepart(\DateTimeInterface $depart): self
    {
        $this->depart = $depart;

        return $this;
    }

    public function getNombreVoyageurs(): ?int
    {
        return $this->nombre_voyageurs;
    }

    public function setNombreVoyageurs(int $nombre_voyageurs): self
    {
        $this->nombre_voyageurs = $nombre_voyageurs;

        return $this;
    }

    public function getVoyageur(): ?Voyageur
    {
        return $this->voyageur;
    }

    public function setVoyageur(?Voyageur $voyageur): self
    {
        $this->voyageur = $voyageur;

        return $this;
    }

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(Paiement $paiement): self
    {
        $this->paiement = $paiement;

        return $this;
    }
}
