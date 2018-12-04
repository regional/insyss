<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/usuario")
 */
class UsuarioController extends Controller
{
    /**
     * @Route("/", name="lista_usuarios")
     */
    public function indexAction(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $usuario = new Usuario();
        $usuario->setNombre("Francis");
        $usuario->setApellido("Guzman");
        $usuario->setEmail("francis@gmail.com");
        $usuario->setHabilitado(true);

        $encoder = $encoder->encodePassword($usuario, "123456");
        $usuario ->setPassword($encoder);

        $manejadorDb = $this->getDoctrine() ->getManager();
        $manejadorDb->persist($usuario);
        $manejadorDb->flush();

        $usuarios = $this->getDoctrine()->getRepository(Usuario::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Usuario/lista_usuarios.html.twig', [
            "usuarios" => $usuarios
        ]);
    }


}
