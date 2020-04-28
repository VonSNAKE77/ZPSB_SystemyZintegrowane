<?php

namespace App\Controller;

use App\Entity\Kont;
use App\Form\KontType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kont")
 */
class KontController extends AbstractController
{
    /**
     * @Route("/", name="kont_index", methods={"GET"})
     */
    public function index(): Response
    {
        $konts = $this->getDoctrine()
            ->getRepository(Kont::class)
            ->findAll();

        return $this->render('kont/index.html.twig', [
            'konts' => $konts,
        ]);
    }

    /**
     * @Route("/new", name="kont_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kont = new Kont();
        $form = $this->createForm(KontType::class, $kont);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kont);
            $entityManager->flush();

            return $this->redirectToRoute('kont_index');
        }

        return $this->render('kont/new.html.twig', [
            'kont' => $kont,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kont_show", methods={"GET"})
     */
    public function show(Kont $kont): Response
    {
        return $this->render('kont/show.html.twig', [
            'kont' => $kont,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kont_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Kont $kont): Response
    {
        $form = $this->createForm(KontType::class, $kont);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kont_index');
        }

        return $this->render('kont/edit.html.twig', [
            'kont' => $kont,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kont_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Kont $kont): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kont->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kont);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kont_index');
    }
}
