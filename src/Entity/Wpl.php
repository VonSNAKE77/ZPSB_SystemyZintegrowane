<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wpl
 *
 * @ORM\Table(name="wpl")
 * @ORM\Entity
 */
class Wpl
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
     * @ORM\Column(name="kwota", type="string", length=40, nullable=false)
     */
    private $kwota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_platnosci", type="date", nullable=false)
     */
    private $dataPlatnosci;

    /**
     * @var string
     *
     * @ORM\Column(name="tytul", type="string", length=40, nullable=false)
     */
    private $tytul;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKwota(): ?string
    {
        return $this->kwota;
    }

    public function setKwota(string $kwota): self
    {
        $this->kwota = $kwota;

        return $this;
    }

    public function getDataPlatnosci(): ?\DateTimeInterface
    {
        return $this->dataPlatnosci;
    }

    public function setDataPlatnosci(\DateTimeInterface $dataPlatnosci): self
    {
        $this->dataPlatnosci = $dataPlatnosci;

        return $this;
    }

    public function getTytul(): ?string
    {
        return $this->tytul;
    }

    public function setTytul(string $tytul): self
    {
        $this->tytul = $tytul;

        return $this;
    }


}
