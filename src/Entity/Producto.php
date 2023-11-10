<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="Producto", indexes={@ORM\Index(name="id_movil", columns={"id_movil"}), @ORM\Index(name="id_tablets", columns={"id_tablets"}), @ORM\Index(name="id_consola", columns={"id_consola"}), @ORM\Index(name="id_juego", columns={"id_juego"})})
 * @ORM\Entity(repositoryClass="App\Repository\AppRepository")
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProducto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;

    /**
     * @var Juego
     *
     * @ORM\ManyToOne(targetEntity="Juego")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_juego", referencedColumnName="id_juego")
     * })
     */
    private $idJuego;

    /**
     * @var Consola
     *
     * @ORM\ManyToOne(targetEntity="Consola")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_consola", referencedColumnName="id_consola")
     * })
     */
    private $idConsola;

    /**
     * @var Tablets
     *
     * @ORM\ManyToOne(targetEntity="Tablets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tablets", referencedColumnName="id_tablets")
     * })
     */
    private $idTablets;

    /**
     * @var Movil
     *
     * @ORM\ManyToOne(targetEntity="Movil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_movil", referencedColumnName="id_movil")
     * })
     */
    private $idMovil;
    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="string", length=1000, nullable=true)
     */
    private $foto;

    /**
     * @var int
     *
     * @ORM\Column(name="precio", type="integer", nullable=true)
     */
    private $precio;
    /**
     * @var string|null
     *
     * @ORM\Column(name="info", type="string", length=500, nullable=true)
     */
    private $info;

    public function getIdProducto(): int
    {
        return $this->idProducto;
    }

    public function setIdProducto(int $idProducto): void
    {
        $this->idProducto = $idProducto;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): void
    {
        $this->stock = $stock;
    }

    public function getIdJuego(): ?Juego
    {
        return $this->idJuego;
    }

    public function setIdJuego(?Juego $idJuego): void
    {
        $this->idJuego = $idJuego;
    }

    public function getIdConsola(): ?Consola
    {
        return $this->idConsola;
    }

    public function setIdConsola(?Consola $idConsola): void
    {
        $this->idConsola = $idConsola;
    }

    public function getIdTablets(): ?Tablets
    {
        return $this->idTablets;
    }

    public function setIdTablets(?Tablets $idTablets): void
    {
        $this->idTablets = $idTablets;
    }

    public function getIdMovil(): ?Movil
    {
        return $this->idMovil;
    }

    public function setIdMovil(?Movil $idMovil): void
    {
        $this->idMovil = $idMovil;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): void
    {
        $this->foto = $foto;
    }

    public function getPrecio(): int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): void
    {
        $this->precio = $precio;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): void
    {
        $this->info = $info;
    }


}
