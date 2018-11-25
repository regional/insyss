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
        $user = new Usuario();
        $form = $this->createForm(UsuarioType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $query = $em->createQuery("Select u Frorm AppBundle:Usuario u where u.email = :email")
                    ->setParameter("email", $form->get("email")->getData());
                $resultado = $query->getResult();
                if(count($resultado)==0){
                    $factory = $this->get("security.encoder_factory");
                    $encoder = $factory->getEncoder($user);
                    $p = $encoder->enconderPassword($form->get("password")->getData(),$user->getSalt());
                    $user->setPassword($p);
                    $em->persist($user);
                    $flush=$em->flush();
                    if($flush==null){
                        $estatus="Usuario registrado Exitosamente.";
                        return $this->redirectToRoute("homepage");
                    }
                    else{
                        $estatus="No se puedo completar el registro, favor intentelo de nuevo o más tarde.";
                    }
                }//     Fin del count
                else{
                    $estatus="Este usuario ya está registrado";
                }
            }//     Fin del isValid
            else{
                $estatus="No se ha completado correctamente el registro";
            }
        }//     Fin del isSubmited

        // replace this example code with whatever you need
        return $this->render('@App/Usuario/registro.html.twig',
            array("form"=>$form->createView()));
    }


}
