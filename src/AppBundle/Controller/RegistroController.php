<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegistroController extends Controller
{
    /**
     * @Route("/registro", name="registro")
     */
    public function registroAction(Request $request)
    {


        // replace this example code with whatever you need
        return $this->render('@App/Usuario/registro.html.twig',
            array("form"=>$form->createView()));
    }


}
