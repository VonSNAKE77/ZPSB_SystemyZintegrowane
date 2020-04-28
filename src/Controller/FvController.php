<?php

namespace App\Controller;

use App\Entity\Fv;
use App\Form\FvType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fv")
 */
class FvController extends AbstractController
{
    /**
     * @Route("/", name="fv_index", methods={"GET"})
     */
    public function index(): Response
    {
        $fvs = $this->getDoctrine()
            ->getRepository(Fv::class)
            ->findAll();

        return $this->render('fv/index.html.twig', [
            'fvs' => $fvs,
        ]);
    }

    /**
     * @Route("/new", name="fv_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fv = new Fv();
        $form = $this->createForm(FvType::class, $fv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fv);
            $entityManager->flush();

            return $this->redirectToRoute('fv_index');
        }

        return $this->render('fv/new.html.twig', [
            'fv' => $fv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fv_show", methods={"GET"})
     */
    public function show(Fv $fv): Response
    {
        return $this->render('fv/show.html.twig', [
            'fv' => $fv,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fv $fv): Response
    {
        $form = $this->createForm(FvType::class, $fv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fv_index');
        }

        return $this->render('fv/edit.html.twig', [
            'fv' => $fv,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fv_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fv $fv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fv_index');
    }
}
