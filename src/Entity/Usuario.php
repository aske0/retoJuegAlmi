<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
#[UniqueEntity(fields: ['usuario'], message: 'There is already an account with this usuario')]
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=150, nullable=true)
     */
    private $usuario;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dni", type="string", length=50, nullable=true)
     */
    private $dni;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="blob", length=65535, nullable=true)
     */
    private $foto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localizacion", type="string", length=150, nullable=true)
     */
    private $localizacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="string", length=255, nullable=true)
     */
    private $roles;


    public function getRoles(): array
    { // Define los roles del usuario (por ejemplo, ['ROLE_USER'])
        $roles = $this->roles;
        return array_unique([$roles]);
    }

    public function eraseCredentials()
    { // Puedes dejar esto en blanco o implementarlo si necesitas borrar datos sensibles
    }

    public function getUserIdentifier(): string
    { // Devuelve un identificador único del usuario
        return $this->usuario; // O, si prefieres, $this->email
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }



    public function setRoles(String $roles): void
    {
        $this->roles = $roles;
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(?string $dni): void
    {
        $this->dni = $dni;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): void
    {
        $this->foto = $foto;
    }

    public function getLocalizacion(): ?string
    {
        return $this->localizacion;
    }

    public function setLocalizacion(?string $localizacion): void
    {
        $this->localizacion = $localizacion;
    }

}
