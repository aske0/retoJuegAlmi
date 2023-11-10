<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * ProductoServicio
 *
 * @ORM\Table(name="Producto_Servicio", indexes={@ORM\Index(name="id_producto", columns={"id_producto"}), @ORM\Index(name="id_servicio", columns={"id_servicio"})})
 * @ORM\Entity
 */
class ProductoServicio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_producto_servicio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProductoServicio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="precio_fin", type="integer", nullable=true)
     */
    private $precioFin;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var Servicio
     *
     * @ORM\ManyToOne(targetEntity="Servicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_servicio", referencedColumnName="id_servicio")
     * })
     */
    private $idServicio;

    /**
     * @var Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id_producto")
     * })
     */
    private $idProducto;

    public function getIdProductoServicio(): int
    {
        return $this->idProductoServicio;
    }

    public function setIdProductoServicio(int $idProductoServicio): void
    {
        $this->idProductoServicio = $idProductoServicio;
    }

    public function getPrecioFin(): ?int
    {
        return $this->precioFin;
    }

    public function setPrecioFin(?int $precioFin): void
    {
        $this->precioFin = $precioFin;
    }

    public function getFecha(): ?\DateTime
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getIdServicio(): Servicio
    {
        return $this->idServicio;
    }

    public function setIdServicio(Servicio $idServicio): void
    {
        $this->idServicio = $idServicio;
    }

    public function getIdProducto(): Producto
    {
        return $this->idProducto;
    }

    public function setIdProducto(Producto $idProducto): void
    {
        $this->idProducto = $idProducto;
    }


}
