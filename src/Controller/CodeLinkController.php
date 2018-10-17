<?php

namespace App\Controller;

use App\Entity\CodeLink;
use App\Form\CodeLinkType;
use App\Repository\CodeLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/code/link")
 */
class CodeLinkController extends AbstractController
{
    /**
     * @Route("/", name="code_link_index", methods="GET")
     */
    public function index(CodeLinkRepository $codeLinkRepository): Response
    {
        return $this->render('code_link/index.html.twig', ['code_links' => $codeLinkRepository->findAll()]);
    }

    /**
     * @Route("/new", name="code_link_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $codeLink = new CodeLink();
        $form = $this->createForm(CodeLinkType::class, $codeLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($codeLink);
            $em->flush();

            return $this->redirectToRoute('code_link_index');
        }

        return $this->render('code_link/new.html.twig', [
            'code_link' => $codeLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="code_link_show", methods="GET")
     */
    public function show(CodeLink $codeLink): Response
    {
        return $this->render('code_link/show.html.twig', ['code_link' => $codeLink]);
    }

    /**
     * @Route("/{id}/edit", name="code_link_edit", methods="GET|POST")
     */
    public function edit(Request $request, CodeLink $codeLink): Response
    {
        $form = $this->createForm(CodeLinkType::class, $codeLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('code_link_edit', ['id' => $codeLink->getId()]);
        }

        return $this->render('code_link/edit.html.twig', [
            'code_link' => $codeLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="code_link_delete", methods="DELETE")
     */
    public function delete(Request $request, CodeLink $codeLink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$codeLink->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($codeLink);
            $em->flush();
        }

        return $this->redirectToRoute('code_link_index');
    }
}
