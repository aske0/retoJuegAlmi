<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoReparacion
 *
 * @ORM\Table(name="Tipo_reparacion")
 * @ORM\Entity
 */
class TipoReparacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo_reparacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoReparacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=true)
     */
    private $nombre;

    public function getIdTipoReparacion(): int
    {
        return $this->idTipoReparacion;
    }

    public function setIdTipoReparacion(int $idTipoReparacion): void
    {
        $this->idTipoReparacion = $idTipoReparacion;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }


}
