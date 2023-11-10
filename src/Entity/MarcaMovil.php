<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarcaMovil
 *
 * @ORM\Table(name="Marca_movil")
 * @ORM\Entity
 */
class MarcaMovil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_marca_movil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMarcaMovil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    public function getIdMarcaMovil(): int
    {
        return $this->idMarcaMovil;
    }

    public function setIdMarcaMovil(int $idMarcaMovil): void
    {
        $this->idMarcaMovil = $idMarcaMovil;
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
