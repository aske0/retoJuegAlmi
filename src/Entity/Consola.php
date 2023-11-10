<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consola
 *
 * @ORM\Table(name="Consola")
 * @ORM\Entity
 */
class Consola
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_consola", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConsola;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marca", type="string", length=50, nullable=true)
     */
    private $marca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modelo", type="string", length=50, nullable=true)
     */
    private $modelo;

    public function getIdConsola(): int
    {
        return $this->idConsola;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setIdConsola(int $idConsola): void
    {
        $this->idConsola = $idConsola;
    }

    public function setMarca(?string $marca): void
    {
        $this->marca = $marca;
    }

    public function setModelo(?string $modelo): void
    {
        $this->modelo = $modelo;
    }

}
