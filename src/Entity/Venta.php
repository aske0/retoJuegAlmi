<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="Venta")
 * @ORM\Entity
 */
class Venta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_venta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVenta;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localizacion", type="string", length=100, nullable=true)
     */
    private $localizacion;

    public function getIdVenta(): int
    {
        return $this->idVenta;
    }

    public function setIdVenta(int $idVenta): void
    {
        $this->idVenta = $idVenta;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getLocalizacion(): ?string
    {
        return $this->localizacion;
    }

}
