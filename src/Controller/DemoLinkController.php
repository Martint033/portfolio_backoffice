<?php

namespace App\Controller;

use App\Entity\DemoLink;
use App\Form\DemoLinkType;
use App\Repository\DemoLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demo/link")
 */
class DemoLinkController extends AbstractController
{
    /**
     * @Route("/", name="demo_link_index", methods="GET")
     */
    public function index(DemoLinkRepository $demoLinkRepository): Response
    {
        return $this->render('demo_link/index.html.twig', ['demo_links' => $demoLinkRepository->findAll()]);
    }

    /**
     * @Route("/new", name="demo_link_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $demoLink = new DemoLink();
        $form = $this->createForm(DemoLinkType::class, $demoLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demoLink);
            $em->flush();

            return $this->redirectToRoute('demo_link_index');
        }

        return $this->render('demo_link/new.html.twig', [
            'demo_link' => $demoLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demo_link_show", methods="GET")
     */
    public function show(DemoLink $demoLink): Response
    {
        return $this->render('demo_link/show.html.twig', ['demo_link' => $demoLink]);
    }

    /**
     * @Route("/{id}/edit", name="demo_link_edit", methods="GET|POST")
     */
    public function edit(Request $request, DemoLink $demoLink): Response
    {
        $form = $this->createForm(DemoLinkType::class, $demoLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demo_link_edit', ['id' => $demoLink->getId()]);
        }

        return $this->render('demo_link/edit.html.twig', [
            'demo_link' => $demoLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="demo_link_delete", methods="DELETE")
     */
    public function delete(Request $request, DemoLink $demoLink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demoLink->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demoLink);
            $em->flush();
        }

        return $this->redirectToRoute('demo_link_index');
    }
}
