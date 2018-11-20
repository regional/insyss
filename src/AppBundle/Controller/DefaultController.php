<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $usuario = new Usuario();
        $usuario->setNombre("Juan");
        $usuario->setApellido("De los palotes");
        $usuario->setEmail("juanp@gmail.com");
        $usuario->setPassword("3333");
        $usuario->setHabilitado(true);

        $manejadorDb = $this->getDoctrine() ->getManager();
        $manejadorDb->persist($usuario);
        $manejadorDb->flush();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/{id}", name="homepage2")
     * @param Request $request
     * @param Usuario $usuario
     */
    public function index2Action(Request $request, Usuario $usuario)
    {

        // replace this example code with whatever you need
        return $this->render('@App/Usuario/ver_usuario.html.twig',
            [
                "usuarios" => [$usuario]
            ]);
    }
}
