<?php

namespace App\Controller;

use App\Entity\Wpl;
use App\Form\WplType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wpl")
 */
class WplController extends AbstractController
{
    /**
     * @Route("/", name="wpl_index", methods={"GET"})
     */
    public function index(): Response
    {
        $wpls = $this->getDoctrine()
            ->getRepository(Wpl::class)
            ->findAll();

        return $this->render('wpl/index.html.twig', [
            'wpls' => $wpls,
        ]);
    }

    /**
     * @Route("/new", name="wpl_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $wpl = new Wpl();
        $form = $this->createForm(WplType::class, $wpl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wpl);
            $entityManager->flush();

            return $this->redirectToRoute('wpl_index');
        }

        return $this->render('wpl/new.html.twig', [
            'wpl' => $wpl,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="wpl_show", methods={"GET"})
     */
    public function show(Wpl $wpl): Response
    {
        return $this->render('wpl/show.html.twig', [
            'wpl' => $wpl,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="wpl_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Wpl $wpl): Response
    {
        $form = $this->createForm(WplType::class, $wpl);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('wpl_index');
        }

        return $this->render('wpl/edit.html.twig', [
            'wpl' => $wpl,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="wpl_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Wpl $wpl): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wpl->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($wpl);
            $entityManager->flush();
        }

        return $this->redirectToRoute('wpl_index');
    }
}
