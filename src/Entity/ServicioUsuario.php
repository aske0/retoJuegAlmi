<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicioUsuario
 *
 * @ORM\Table(name="Servicio_Usuario", indexes={@ORM\Index(name="id_usuario", columns={"id_usuario"}), @ORM\Index(name="id_servicio", columns={"id_servicio"})})
 * @ORM\Entity
 */
class ServicioUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_servicio_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idServicioUsuario;

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
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    public function getIdServicioUsuario(): int
    {
        return $this->idServicioUsuario;
    }

    public function setIdServicioUsuario(int $idServicioUsuario): void
    {
        $this->idServicioUsuario = $idServicioUsuario;
    }

    public function getIdServicio(): Servicio
    {
        return $this->idServicio;
    }

    public function setIdServicio(Servicio $idServicio): void
    {
        $this->idServicio = $idServicio;
    }

    public function getIdUsuario(): Usuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(Usuario $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }


}
