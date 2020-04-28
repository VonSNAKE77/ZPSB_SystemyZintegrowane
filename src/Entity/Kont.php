<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kont
 *
 * @ORM\Table(name="kont")
 * @ORM\Entity
 */
class Kont
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwa", type="string", length=14, nullable=false)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="adres", type="string", length=14, nullable=false)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", length=10, nullable=false)
     */
    private $nip;

    /**
     * @var string
     *
     * @ORM\Column(name="konto", type="string", length=26, nullable=false)
     */
    private $konto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getKonto(): ?string
    {
        return $this->konto;
    }

    public function setKonto(string $konto): self
    {
        $this->konto = $konto;

        return $this;
    }


}
