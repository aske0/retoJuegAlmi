<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Alquiler
 *
 * @ORM\Table(name="Alquiler")
 * @ORM\Entity
 */
class Alquiler
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_alquiler", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAlquiler;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="devuelto", type="boolean", nullable=true)
     */
    private $devuelto;


}
