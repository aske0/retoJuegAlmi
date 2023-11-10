<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Juego
 *
 * @ORM\Table(name="Juego")
 * @ORM\Entity
 */
class Juego
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_juego", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJuego;

    /**
     * @var string|null
     *
     * @ORM\Column(name="desarrollador", type="string", length=50, nullable=true)
     */
    private $desarrollador;

    /**
     * @var string|null
     *
     * @ORM\Column(name="genero", type="string", length=50, nullable=true)
     */
    private $genero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;
    public function getIdJuego(): int
    {
        return $this->idJuego;
    }

    public function setIdJuego(int $idJuego): void
    {
        $this->idJuego = $idJuego;
    }

    public function getDesarrollador(): ?string
    {
        return $this->desarrollador;
    }

    public function setDesarrollador(?string $desarrollador): void
    {
        $this->desarrollador = $desarrollador;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): void
    {
        $this->genero = $genero;
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
