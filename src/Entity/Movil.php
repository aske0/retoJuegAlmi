<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movil
 *
 * @ORM\Table(name="Movil", indexes={@ORM\Index(name="id_marca_movil", columns={"id_marca_movil"})})
 * @ORM\Entity
 */
class Movil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_movil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMovil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modelo", type="string", length=50, nullable=true)
     */
    private $modelo;

    /**
     * @var MarcaMovil
     *
     * @ORM\ManyToOne(targetEntity="MarcaMovil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_marca_movil", referencedColumnName="id_marca_movil")
     * })
     */
    private $idMarcaMovil;


    public function getIdMovil(): int
    {
        return $this->idMovil;
    }

    public function setIdMovil(int $idMovil): void
    {
        $this->idMovil = $idMovil;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getIdMarcaMovil(): MarcaMovil
    {
        return $this->idMarcaMovil;
    }

    public function setIdMarcaMovil(MarcaMovil $idMarcaMovil): void
    {
        $this->idMarcaMovil = $idMarcaMovil;
    }

}
