<?php

namespace App\Controller;

use App\Entity\TfgTparametro;
use App\Form\TfgTparametroType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tfg/tparametro')]
class TfgTparametroController extends AbstractController
{
    #[Route('/', name: 'tfg_tparametro_index', methods: ['GET'])]
    public function index(): Response
    {
        $tfgTparametros = $this->getDoctrine()
            ->getRepository(TfgTparametro::class)
            ->findAll();

        return $this->render('tfg_tparametro/index.html.twig', [
            'tfg_tparametros' => $tfgTparametros,
        ]);
    }

    #[Route('/new', name: 'tfg_tparametro_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tfgTparametro = new TfgTparametro();
        $form = $this->createForm(TfgTparametroType::class, $tfgTparametro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tfgTparametro);
            $entityManager->flush();

            return $this->redirectToRoute('tfg_tparametro_index');
        }

        return $this->render('tfg_tparametro/new.html.twig', [
            'tfg_tparametro' => $tfgTparametro,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'tfg_tparametro_show', methods: ['GET'])]
    public function show(TfgTparametro $tfgTparametro): Response
    {
        return $this->render('tfg_tparametro/show.html.twig', [
            'tfg_tparametro' => $tfgTparametro,
        ]);
    }

    #[Route('/{id}/edit', name: 'tfg_tparametro_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TfgTparametro $tfgTparametro): Response
    {
        $form = $this->createForm(TfgTparametroType::class, $tfgTparametro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tfg_tparametro_index');
        }

        return $this->render('tfg_tparametro/edit.html.twig', [
            'tfg_tparametro' => $tfgTparametro,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'tfg_tparametro_delete', methods: ['DELETE'])]
    public function delete(Request $request, TfgTparametro $tfgTparametro): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tfgTparametro->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tfgTparametro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tfg_tparametro_index');
    }
}
