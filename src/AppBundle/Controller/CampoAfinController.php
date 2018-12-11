<?php

namespace AppBundle\Controller;


use AppBundle\Entity\CampoAfin;
use AppBundle\Form\CampoAfinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class CampoAfinController extends Controller
{
    /**
     * @Route("/campos_afines", name="campos_afines")
     */
    public function indexAction(Request $request)
    {
        $campoAfin = new campoAfin();
        $form = $this->createForm(CampoAfinType::class, $campoAfin);
        $form->handleRequest($request);

        $campoAfin = $this->getDoctrine()->getRepository(CampoAfin::class)->findAll();



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/campos_afines.html.twig', [
            "camposafines" => $campoAfin
        ]);
    }

    /**
     * @Route("/nuevo_campos_afines", name="nuevo_campos_afines")
     */
    public function indexAction2(Request $request)
    {
        $campoAfin = new campoAfin();
        $form = $this->createForm(CampoAfinType::class, $campoAfin);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->persist($campoAfin);
            $manejadorDb->flush();

            return $this->redirectToRoute('campos_afines');
        }



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/crear_campo_afin.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/nuevo_campos_afines/{id}/edit", name="edit_campos_afines")
     */
    public function editCampo(Request $request, CampoAfin $campoAfin)
    {
        $form = $this->createForm(CampoAfinType::class, $campoAfin);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $manejadorDb = $this->getDoctrine() ->getManager();
            $manejadorDb->flush();

            return $this->redirectToRoute('campos_afines');
        }



        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/crear_campo_afin.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/campos_afines/{id}", name="delete_campos_afines")
     */
    public function deleteCampo(Request $request, CampoAfin $campoAfin)
    {
        $manejadorDb=$this->getDoctrine()->getManager();

        if($campoAfin && is_object($campoAfin)){
        $manejadorDb->remove($campoAfin);
        $manejadorDb->flush();

        }
        return $this->redirectToRoute('campos_afines');

        // replace this example code with whatever you need
        return $this->render('@App/CamposAfines/campos_afines.html.twig');
    }
}