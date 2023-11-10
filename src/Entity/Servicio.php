<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="Servicio", indexes={@ORM\Index(name="id_venta", columns={"id_venta"}), @ORM\Index(name="id_reparacion", columns={"id_reparacion"}), @ORM\Index(name="id_alquiler", columns={"id_alquiler"})})
 * @ORM\Entity
 */
class Servicio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_servicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idServicio;

    /**
     * @var Alquiler
     *
     * @ORM\ManyToOne(targetEntity="Alquiler")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_alquiler", referencedColumnName="id_alquiler")
     * })
     */
    private $idAlquiler;

    /**
     * @var Reparacion
     *
     * @ORM\ManyToOne(targetEntity="Reparacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reparacion", referencedColumnName="id_reparacion")
     * })
     */
    private $idReparacion;

    /**
     * @var Venta
     *
     * @ORM\ManyToOne(targetEntity="Venta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_venta", referencedColumnName="id_venta")
     * })
     */
    private $idVenta;

    public function getIdServicio(): int
    {
        return $this->idServicio;
    }

    public function setIdServicio(int $idServicio): void
    {
        $this->idServicio = $idServicio;
    }

    public function getIdAlquiler(): Alquiler
    {
        return $this->idAlquiler;
    }

    public function setIdAlquiler(Alquiler $idAlquiler): void
    {
        $this->idAlquiler = $idAlquiler;
    }

    public function getIdReparacion(): Reparacion
    {
        return $this->idReparacion;
    }

    public function setIdReparacion(Reparacion $idReparacion): void
    {
        $this->idReparacion = $idReparacion;
    }

    public function getIdVenta(): Venta
    {
        return $this->idVenta;
    }

    public function setIdVenta(Venta $idVenta): void
    {
        $this->idVenta = $idVenta;
    }


}
