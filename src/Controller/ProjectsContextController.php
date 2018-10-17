<?php

namespace App\Controller;

use App\Entity\ProjectsContext;
use App\Form\ProjectsContextType;
use App\Repository\ProjectsContextRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projects/context")
 */
class ProjectsContextController extends AbstractController
{
    /**
     * @Route("/", name="projects_context_index", methods="GET")
     */
    public function index(ProjectsContextRepository $projectsContextRepository): Response
    {
        return $this->render('projects_context/index.html.twig', ['projects_contexts' => $projectsContextRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projects_context_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projectsContext = new ProjectsContext();
        $form = $this->createForm(ProjectsContextType::class, $projectsContext);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectsContext);
            $em->flush();

            return $this->redirectToRoute('projects_context_index');
        }

        return $this->render('projects_context/new.html.twig', [
            'projects_context' => $projectsContext,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_context_show", methods="GET")
     */
    public function show(ProjectsContext $projectsContext): Response
    {
        return $this->render('projects_context/show.html.twig', ['projects_context' => $projectsContext]);
    }

    /**
     * @Route("/{id}/edit", name="projects_context_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjectsContext $projectsContext): Response
    {
        $form = $this->createForm(ProjectsContextType::class, $projectsContext);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projects_context_edit', ['id' => $projectsContext->getId()]);
        }

        return $this->render('projects_context/edit.html.twig', [
            'projects_context' => $projectsContext,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_context_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjectsContext $projectsContext): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectsContext->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectsContext);
            $em->flush();
        }

        return $this->redirectToRoute('projects_context_index');
    }
}
