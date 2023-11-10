<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class AppRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
        $this->entityManager = $this->getEntityManager();
    }

    public function infoConsola() : array
    {
        $sql = "SELECT p.foto, p.stock, p.precio, p.info, c.marca, c.modelo, c.idConsola
                FROM App\Entity\Producto p
                JOIN App\Entity\Consola c WHERE p.idConsola = c.idConsola";
        $query = $this->entityManager->createQuery($sql);
        return $query->execute();
    }

    public function infoJuego() : array
    {
        $sql = "SELECT p.foto, p.stock, p.precio, p.info, j.nombre, j.desarrollador, j.genero, j.idJuego
                FROM App\Entity\Producto p
                JOIN App\Entity\Juego j WHERE p.idJuego = j.idJuego";
        $query = $this->entityManager->createQuery($sql);
        return $query->execute();
    }

    public function infoMovil() : array
    {
        $sql = "SELECT p.foto, p.stock, p.precio, p.info, m.modelo, m.idMovil, mm.nombre
                FROM App\Entity\Producto p
                JOIN App\Entity\Movil m 
                JOIN App\Entity\MarcaMovil mm
                WHERE p.idMovil = m.idMovil
                AND m.idMarcaMovil = mm.idMarcaMovil";

        $query = $this->entityManager->createQuery($sql);
        return $query->execute();
    }

    public function infoTablets() : array
    {
        $sql = "SELECT p.foto, p.stock, p.precio, p.info, t.modelo, t.idTablets, mt.nombre
                FROM App\Entity\Producto p
                JOIN App\Entity\Tablets t 
                JOIN App\Entity\MarcaTablets mt
                WHERE p.idTablets = t.idTablets
                AND t.idMarcaTablets = mt.idMarcaTablets";

        $query = $this->entityManager->createQuery($sql);
        return $query->execute();
    }

    public function sotckUpdate($id, $numero) : array
    {
        $sql = "UPDATE App\Entity\Producto p
                SET p.stock = p.stock - :numero
                WHERE p.idProducto = :id";
        $query = $this->entityManager->createQuery($sql)
            ->setParameter('numero', '%'.$numero.'%')
            ->setParameter('id', '%'.$id.'%');
        return $query->execute();
    }

}

