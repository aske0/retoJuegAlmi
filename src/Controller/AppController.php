<?php

namespace App\Controller;

use App\Entity\Consola;
use App\Entity\Juego;
use App\Entity\MarcaMovil;
use App\Entity\MarcaTablets;
use App\Entity\Movil;
use App\Entity\Producto;
use App\Entity\Tablets;
use App\Form\ConsolaFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/app/consola', name: 'app_consola')]
    public function indexConsola(): Response
    {
        $parametros = array('titulo' => 'CONSOLA');
        //Carga de datos
        $datos = $this->entityManager->getRepository(Producto::class)->infoConsola();
        $parametros['consolas'] = $datos;
        return $this->render('app/consola/consola.html.twig', $parametros);
    }
    #[Route('/app/consola/delete/{id}', name: 'app_ws_consolaDelete', methods: ['DELETE'])]
    public  function deleteConsola($id):JsonResponse
    {
        $producto = $this->entityManager->getRepository(Producto::class)->findOneBy(['idConsola'=>$id]);
        $this->entityManager->remove($producto);
        $this->entityManager->flush();

        $consola = $this->entityManager->getRepository(Consola::class)->findOneBy(['idConsola'=>$id]);
        $this->entityManager->remove($consola);
        $this->entityManager->flush();

        return new JsonResponse(['status'=>'equipo eliminado'], Response::HTTP_OK);
    }

    #[Route('/app/consola/add', name: 'app_ws_consola_add')]
    public function setConsola(Request $request): Response
    {
        $form = $this->createForm(ConsolaFormType::class);

        if ($form->isSubmitted() && $form->isValid()) {
dd("hola");
            $producto = new Producto();
            $producto->setInfo($form->get('info')->getData());
            $producto->setStock($form->get('stock')->getData());
            $producto->setFoto($form->get('foto')->getData());
            $producto->setPrecio($form->get('precio')->getData());
            $consola = new Consola();
            $consola->setMarca($form->get('marca')->getData());
            $consola->setModelo($form->get('modelo')->getData());
            $this->entityManager->persist($producto);
            $this->entityManager->persist($consola);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_consola');
        }

        return $this->render('app/consola/consolaadd.html.twig', [
            'consolaForm' => $form->createView(),
        ]);
    }

    #[Route('/app/juego', name: 'app_juego')]
    public function indexJuego(): Response
    {
        $parametros = array('titulo' => 'JUEGO');
        //Carga de datos
        $datos = $this->entityManager->getRepository(Producto::class)->infoJuego();
        $parametros['juegos'] = $datos;
        return $this->render('app/juego/juego.html.twig', $parametros);
    }

    #[Route('/app/juego/delete/{id}', name: 'app_ws_juegoDelete', methods: ['DELETE'])]
    public  function deleteJuego($id):JsonResponse
    {
        $producto = $this->entityManager->getRepository(Producto::class)->findOneBy(['idJuego'=>$id]);
        $this->entityManager->remove($producto);
        $this->entityManager->flush();

        $juego = $this->entityManager->getRepository(Juego::class)->findOneBy(['idJuego'=>$id]);
        $this->entityManager->remove($juego);
        $this->entityManager->flush();
        return new JsonResponse(['status'=>'equipo eliminado'], Response::HTTP_OK);
    }

    #[Route('/app/juego/add', name: 'app_ws_juego_add', methods: ["POST"])]
    public function setJuego(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $juego = new Juego();
        $juego->setNombre($data['nombre']);
        $juego->setDesarrollador($data['desarrollador']);
        $juego->setGenero('genero');
        $producto = new Producto();
        $producto->setInfo($data['info']);
        $producto->setIdJuego($juego);
        $producto->setStock($data['stock']);
        $producto->setFoto($data['foto']);
        $producto->setPrecio($data['precio']);
        $this->entityManager->persist($juego);
        $this->entityManager->persist($producto);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Juego nueva'],
            Response::HTTP_CREATED);
    }
    #[Route('/app/movil', name: 'app_movil')]
    public function indexMovil(): Response
    {
        $parametros = array('titulo' => 'MOVIL');
        //Carga de datos
        $datos = $this->entityManager->getRepository(Producto::class)->infoMovil();
        $parametros['moviles'] = $datos;
        return $this->render('app/movil/movil.html.twig', $parametros);
    }

    #[Route('/app/movil/add', name: 'app_ws_movil_add', methods: ["POST"])]
    public function setMovil(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $marca = $this->entityManager->getRepository(MarcaMovil::class)->findOneBy(['nombre'=>$data['marca']] );
        $movil = new Movil();
        $movil->setIdMarcaMovil($marca);
        $movil->setModelo($data['modelo']);
        $producto = new Producto();
        $producto->setIdMovil($movil);
        $producto->setInfo($data['info']);
        $producto->setStock($data['stock']);
        $producto->setFoto($data['foto']);
        $producto->setPrecio($data['precio']);
        $this->entityManager->persist($movil);
        $this->entityManager->persist($producto);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Movil nueva'],
            Response::HTTP_CREATED);
    }

    #[Route('/app/movil/delete/{id}', name: 'app_ws_movilDelete', methods: ['DELETE'])]
    public  function deleteMovil($id):JsonResponse
    {
        $producto = $this->entityManager->getRepository(Producto::class)->findOneBy(['idMovil'=>$id]);
        $this->entityManager->remove($producto);
        $this->entityManager->flush();

        $movil = $this->entityManager->getRepository(Movil::class)->findOneBy(['idMovil'=>$id]);
        $this->entityManager->remove($movil);
        $this->entityManager->flush();

        return new JsonResponse(['status'=>'equipo eliminado'], Response::HTTP_OK);
    }

    #[Route('/app/tablets', name: 'app_tablets')]
    public function indexTablets(): Response
    {
        $parametros = array('titulo' => 'TABLETS');
        //Carga de datos
        $datos = $this->entityManager->getRepository(Producto::class)->infoTablets();
        $parametros['tablets'] = $datos;
        return $this->render('app/tablets/tablets.html.twig', $parametros);
    }
    #[Route('/app/tablets/add', name: 'app_ws_tablets_add', methods: ["POST"])]
    public function setTablets(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $marca = $this->entityManager->getRepository(MarcaTablets::class)->findOneBy(['nombre'=>$data['marca']]);
        $tablets = new Tablets();
        $tablets->setIdMarcaTablets($marca);
        $tablets->setModelo($data['modelo']);
        $producto = new Producto();
        $producto->setIdTablets($tablets);
        $producto->setInfo($data['info']);
        $producto->setStock($data['stock']);
        $producto->setFoto($data['foto']);
        $producto->setPrecio($data['precio']);
        $this->entityManager->persist($tablets);
        $this->entityManager->persist($producto);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Tablet nueva'],
            Response::HTTP_CREATED);
    }

    #[Route('/app/tablets/delete/{id}', name: 'app_ws_tabletsDelete', methods: ['DELETE'])]
    public  function deleteTablets($id):JsonResponse
    {
        $producto = $this->entityManager->getRepository(Producto::class)->findOneBy(['idTablets'=>$id]);
        $this->entityManager->remove($producto);
        $this->entityManager->flush();

        $tablets = $this->entityManager->getRepository(Tablets::class)->findOneBy(['idTablets'=>$id]);
        $this->entityManager->remove($tablets);
        $this->entityManager->flush();

        return new JsonResponse(['status'=>'tablet eliminado'], Response::HTTP_OK);
    }


    #[Route('/app/marcaMovil/add', name: 'app_ws_marcaMovil_add', methods: ["POST"])]
    public function setMarcaMovil(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $marca = new MarcaMovil();
        $marca->setNombre($data['nombre']);
        $this->entityManager->persist($marca);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Marca creado'],
            Response::HTTP_CREATED);
    }

    #[Route('/app/marcaTablet/add', name: 'app_ws_marcaTablet_add', methods: ["POST"])]
    public function setMarcaTablet(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $marca = new MarcaTablets();
        $marca->setNombre($data['nombre']);
        $this->entityManager->persist($marca);
        $this->entityManager->flush();
        return new JsonResponse(['status' => 'Marca creado'],
            Response::HTTP_CREATED);
    }
}
