<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_bien = null;

    #[ORM\Column]
    private ?int $nombre_voyageur_max = null;

    #[ORM\Column]
    private ?int $nombre_lit = null;

    #[ORM\Column]
    private ?int $nombre_chambre = null;

    #[ORM\Column]
    private ?int $nombre_salle_bain = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?bool $annulation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hote $hote = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Reservation $reservation = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeBien(): ?string
    {
        return $this->type_bien;
    }

    public function setTypeBien(string $type_bien): self
    {
        $this->type_bien = $type_bien;

        return $this;
    }

    public function getNombreVoyageurMax(): ?int
    {
        return $this->nombre_voyageur_max;
    }

    public function setNombreVoyageurMax(int $nombre_voyageur_max): self
    {
        $this->nombre_voyageur_max = $nombre_voyageur_max;

        return $this;
    }

    public function getNombreLit(): ?int
    {
        return $this->nombre_lit;
    }

    public function setNombreLit(int $nombre_lit): self
    {
        $this->nombre_lit = $nombre_lit;

        return $this;
    }

    public function getNombreChambre(): ?int
    {
        return $this->nombre_chambre;
    }

    public function setNombreChambre(int $nombre_chambre): self
    {
        $this->nombre_chambre = $nombre_chambre;

        return $this;
    }

    public function getNombreSalleBain(): ?int
    {
        return $this->nombre_salle_bain;
    }

    public function setNombreSalleBain(int $nombre_salle_bain): self
    {
        $this->nombre_salle_bain = $nombre_salle_bain;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function isAnnulation(): ?bool
    {
        return $this->annulation;
    }

    public function setAnnulation(bool $annulation): self
    {
        $this->annulation = $annulation;

        return $this;
    }

    public function getHote(): ?Hote
    {
        return $this->hote;
    }

    public function setHote(?Hote $hote): self
    {
        $this->hote = $hote;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

}
