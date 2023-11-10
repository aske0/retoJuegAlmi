<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarcaTablets
 *
 * @ORM\Table(name="Marca_tablets")
 * @ORM\Entity
 */
class MarcaTablets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_marca_tablets", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMarcaTablets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    public function getIdMarcaTablets(): int
    {
        return $this->idMarcaTablets;
    }

    public function setIdMarcaTablets(int $idMarcaTablets): void
    {
        $this->idMarcaTablets = $idMarcaTablets;
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
