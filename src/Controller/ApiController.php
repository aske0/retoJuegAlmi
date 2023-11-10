<?php

namespace App\Controller;

use App\Entity\Consola;
use App\Entity\Juego;
use App\Entity\MarcaMovil;
use App\Entity\Movil;
use App\Entity\Producto;
use App\Entity\ProductoServicio;
use App\Entity\Servicio;
use App\Entity\ServicioUsuario;
use App\Entity\Tablets;
use App\Entity\Usuario;
use App\Entity\Venta;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/usuario', name: 'app_ws_usuario', methods: ["GET"])]
    public function getAll(): JsonResponse
    {
        $usuario = $this->entityManager->getRepository(Usuario::class)->findAll();
        $json = $this->convertToJson($usuario);
        return $json;
    }

    #[Route('/api/add', name: 'app_ws_add', methods: ["POST"])]
    public function addUsuario(Request $request, UserPasswordHasherInterface $userPasswordHasher):JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if(empty($data['dni'] || empty($data['nombre'])))
        {
            throw new NotFoundHttpException('Faltan parámetros');
        }
        $usu = new Usuario();
        $usu->setRoles("ROLE_USER");
        $usu->setDni($data['dni']);
        $usu->setUsuario($data['username']);
        $usu->setNombre($data['nombre']);
        $usu->setPassword(
            $userPasswordHasher->hashPassword(
                $usu,
                $data['password']
            )
        );
        $this->entityManager->persist($usu);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Usuario creado'],
            Response::HTTP_CREATED);
    }

    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    #[Route('/api/productos/consola', name: 'app_ws_consola', methods: ["GET"])]
    public function getConsola(): JsonResponse
    {
        $consolas = $this->entityManager->getRepository(Consola::class)->findAll();
        $json = $this->convertToJson($consolas);

        return $json;
    }

    #[Route('/api/productos/consola/{id}', name: 'app_prod_consola', methods: ["GET"])]
    public function getProductoProd($id): JsonResponse
    {
        $consolas = $this->entityManager->getRepository(Producto::class)->findOneBy(['idConsola'=>$id]);
        $json = $this->convertToJson($consolas);

        return $json;
    }

    #[Route('/api/productos/movil', name: 'app_ws_movil', methods: ["GET"])]
    public function getMovil(): JsonResponse
    {
        $movil = $this->entityManager->getRepository(Movil::class)->findAll();
        $json = $this->convertToJson($movil);
        return $json;
    }
    #[Route('/api/productos/movil/{id}', name: 'app_prod_movil', methods: ["GET"])]
    public function getMovilProd($id): JsonResponse
    {
        $movil = $this->entityManager->getRepository(Producto::class)->findOneBy(['idMovil'=>$id]);
        $json = $this->convertToJson($movil);

        return $json;
    }

    #[Route('/api/productos/tablets', name: 'app_ws_tablets', methods: ["GET"])]
    public function getTablets(): JsonResponse
    {
        $tablets = $this->entityManager->getRepository(Tablets::class)->findAll();
        $json = $this->convertToJson($tablets);
        return $json;
    }

    #[Route('/api/productos/tablets/{id}', name: 'app_prod_tablets', methods: ["GET"])]
    public function getTabletProd($id): JsonResponse
    {
        $tablets = $this->entityManager->getRepository(Producto::class)->findOneBy(['idTablets'=>$id]);
        $json = $this->convertToJson($tablets);

        return $json;
    }

    #[Route('/api/productos/juegos', name: 'app_ws_juegos', methods: ["GET"])]
    public function getJuegos(): JsonResponse
    {
        $juego = $this->entityManager->getRepository(Juego::class)->findAll();
        $json = $this->convertToJson($juego);
        return $json;
    }

    #[Route('/api/productos/juegos/{id}', name: 'app_prod_juego', methods: ["GET"])]
    public function getJuegoProd($id): JsonResponse
    {
        $juego = $this->entityManager->getRepository(Producto::class)->findOneBy(['idJuego'=>$id]);
        $json = $this->convertToJson($juego);
        return $json;
    }

    #[Route('/api/findUsu/{usuario}', name: 'app_findUsu', methods: ["GET"])]
    public function getUsuario($usuario): JsonResponse
    {
        $juego = $this->entityManager->getRepository(Usuario::class)->findOneBy(['usuario'=>$usuario]);
        $json = $this->convertToJson($juego);
        return $json;
    }

    #[Route('/api/compra', name: 'app_compra', methods: ["POST"])]
    public function setCompra(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        //FILTRO CANTIDAD
        //CANTIDAD
        $producto = $this->entityManager->getRepository(Producto::class)->find($data['idProducto']);
        $cantidad= $producto->getStock();
        if ($cantidad < $data['cantidad'] ){
            return new JsonResponse(['status' => 'No disponemos del stock'],
                Response::HTTP_CREATED);
        }
        $venta = new Venta();
        $venta->setCantidad($data['cantidad']);
        $this->entityManager->persist($venta);
        $this->entityManager->flush();

        $servicio = new Servicio();
        $servicio->setIdVenta($venta);
        $this->entityManager->persist($servicio);
        $this->entityManager->flush();

        $prodServicio = new ProductoServicio();
        $prodServicio->setIdProducto($producto);
        $prodServicio->setIdServicio($servicio);
        $prodServicio->setPrecioFin($data['precio']);
        $prodServicio->setFecha($data['fecha']);
        $this->entityManager->persist($prodServicio);
        $this->entityManager->flush();

        $usuario = $this->entityManager->getRepository(Usuario::class)->findOneBy(['usuario'=>$data['usuario']]);

        $servUsu = new ServicioUsuario();
        $servUsu->setIdServicio($servicio);
        $servUsu->setIdUsuario($usuario);
        $this->entityManager->persist($servUsu);
        $this->entityManager->flush();


        return new JsonResponse(['status' => 'Compra realizada'],
            Response::HTTP_CREATED);
    }

    #[Route('/api/marcaMovil', name: 'app_ws_marca', methods: ["GET"])]
    public function getMarca(): JsonResponse
    {
        $marca = $this->entityManager->getRepository(MarcaMovil::class)->findAll();
        $json = $this->convertToJson($marca);
        return $json;
    }
    private function convertToJson($object): JsonResponse
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $normalized = $serializer->normalize($object, null, array(DateTimeNormalizer::FORMAT_KEY=>'Y/m/d'));
        $jsonContent = $serializer->serialize($normalized, 'json');
        return JsonResponse::fromJsonString($jsonContent, 200);
    }
}
