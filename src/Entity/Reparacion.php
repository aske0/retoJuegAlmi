<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Reparacion
 *
 * @ORM\Table(name="Reparacion", indexes={@ORM\Index(name="id_tipo_reparacion", columns={"id_tipo_reparacion"})})
 * @ORM\Entity
 */
class Reparacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reparacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReparacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motivo", type="string", length=150, nullable=true)
     */
    private $motivo;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var TipoReparacion
     *
     * @ORM\ManyToOne(targetEntity="TipoReparacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_reparacion", referencedColumnName="id_tipo_reparacion")
     * })
     */
    private $idTipoReparacion;

    public function getIdReparacion(): int
    {
        return $this->idReparacion;
    }

    public function setIdReparacion(int $idReparacion): void
    {
        $this->idReparacion = $idReparacion;
    }

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(?string $motivo): void
    {
        $this->motivo = $motivo;
    }

    public function getFechaFin(): ?\DateTime
    {
        return $this->fechaFin;
    }

    public function setFechaFin(?\DateTime $fechaFin): void
    {
        $this->fechaFin = $fechaFin;
    }

    public function getIdTipoReparacion(): TipoReparacion
    {
        return $this->idTipoReparacion;
    }

    public function setIdTipoReparacion(TipoReparacion $idTipoReparacion): void
    {
        $this->idTipoReparacion = $idTipoReparacion;
    }


}
