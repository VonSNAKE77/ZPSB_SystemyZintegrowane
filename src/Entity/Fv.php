<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fv
 *
 * @ORM\Table(name="fv")
 * @ORM\Entity
 */
class Fv
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
     * @ORM\Column(name="numer_faktury", type="string", length=14, nullable=false)
     */
    private $numerFaktury;

    /**
     * @var string
     *
     * @ORM\Column(name="termin_platnosci", type="string", length=14, nullable=false)
     */
    private $terminPlatnosci;

    /**
     * @var string
     *
     * @ORM\Column(name="kont_ID", type="string", length=14, nullable=false)
     */
    private $kontId;

    /**
     * @var string
     *
     * @ORM\Column(name="typ", type="string", length=14, nullable=false)
     */
    private $typ;

    /**
     * @var string
     *
     * @ORM\Column(name="status_platnosci", type="string", length=14, nullable=false)
     */
    private $statusPlatnosci;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerFaktury(): ?string
    {
        return $this->numerFaktury;
    }

    public function setNumerFaktury(string $numerFaktury): self
    {
        $this->numerFaktury = $numerFaktury;

        return $this;
    }

    public function getTerminPlatnosci(): ?string
    {
        return $this->terminPlatnosci;
    }

    public function setTerminPlatnosci(string $terminPlatnosci): self
    {
        $this->terminPlatnosci = $terminPlatnosci;

        return $this;
    }

    public function getKontId(): ?string
    {
        return $this->kontId;
    }

    public function setKontId(string $kontId): self
    {
        $this->kontId = $kontId;

        return $this;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): self
    {
        $this->typ = $typ;

        return $this;
    }

    public function getStatusPlatnosci(): ?string
    {
        return $this->statusPlatnosci;
    }

    public function setStatusPlatnosci(string $statusPlatnosci): self
    {
        $this->statusPlatnosci = $statusPlatnosci;

        return $this;
    }


}
