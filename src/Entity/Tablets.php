<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tablets
 *
 * @ORM\Table(name="Tablets", indexes={@ORM\Index(name="id_marca_tablets", columns={"id_marca_tablets"})})
 * @ORM\Entity
 */
class Tablets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tablets", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTablets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modelo", type="string", length=50, nullable=true)
     */
    private $modelo;

    /**
     * @var MarcaTablets
     *
     * @ORM\ManyToOne(targetEntity="MarcaTablets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_marca_tablets", referencedColumnName="id_marca_tablets")
     * })
     */
    private $idMarcaTablets;
    public function getIdTablets(): int
    {
        return $this->idTablets;
    }

    public function setIdTablets(int $idTablets): void
    {
        $this->idTablets = $idTablets;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(?string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getIdMarcaTablets(): MarcaTablets
    {
        return $this->idMarcaTablets;
    }

    public function setIdMarcaTablets(MarcaTablets $idMarcaTablets): void
    {
        $this->idMarcaTablets = $idMarcaTablets;
    }

}
