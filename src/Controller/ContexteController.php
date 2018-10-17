<?php

namespace App\Controller;

use App\Entity\Contexte;
use App\Form\ContexteType;
use App\Repository\ContexteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contexte")
 */
class ContexteController extends AbstractController
{
    /**
     * @Route("/", name="contexte_index", methods="GET")
     */
    public function index(ContexteRepository $contexteRepository): Response
    {
        return $this->render('contexte/index.html.twig', ['contextes' => $contexteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="contexte_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $contexte = new Contexte();
        $form = $this->createForm(ContexteType::class, $contexte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contexte);
            $em->flush();

            return $this->redirectToRoute('contexte_index');
        }

        return $this->render('contexte/new.html.twig', [
            'contexte' => $contexte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contexte_show", methods="GET")
     */
    public function show(Contexte $contexte): Response
    {
        return $this->render('contexte/show.html.twig', ['contexte' => $contexte]);
    }

    /**
     * @Route("/{id}/edit", name="contexte_edit", methods="GET|POST")
     */
    public function edit(Request $request, Contexte $contexte): Response
    {
        $form = $this->createForm(ContexteType::class, $contexte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contexte_edit', ['id' => $contexte->getId()]);
        }

        return $this->render('contexte/edit.html.twig', [
            'contexte' => $contexte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contexte_delete", methods="DELETE")
     */
    public function delete(Request $request, Contexte $contexte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contexte->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contexte);
            $em->flush();
        }

        return $this->redirectToRoute('contexte_index');
    }
}
