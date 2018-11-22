<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{
    /**
     * @Route("/", name="lista_usuarios")
     */
    public function indexAction(Request $request)
    {

//        $usuario = new Usuario();
//        $usuario->setNombre("Juan");
//        $usuario->setApellido("De los palotes");
//        $usuario->setEmail("juanp@gmail.com");
//        $usuario->setPassword("3333");
//        $usuario->setHabilitado(true);
//
//        $manejadorDb = $this->getDoctrine() ->getManager();
//        $manejadorDb->persist($usuario);
//        $manejadorDb->flush();
       $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Usuario/lista_usuarios.html.twig', [
            "usuarios" => $usuarios
        ]);
    }


}
