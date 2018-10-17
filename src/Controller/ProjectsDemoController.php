<?php

namespace App\Controller;

use App\Entity\ProjectsDemo;
use App\Form\ProjectsDemoType;
use App\Repository\ProjectsDemoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projects/demo")
 */
class ProjectsDemoController extends AbstractController
{
    /**
     * @Route("/", name="projects_demo_index", methods="GET")
     */
    public function index(ProjectsDemoRepository $projectsDemoRepository): Response
    {
        return $this->render('projects_demo/index.html.twig', ['projects_demos' => $projectsDemoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projects_demo_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projectsDemo = new ProjectsDemo();
        $form = $this->createForm(ProjectsDemoType::class, $projectsDemo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectsDemo);
            $em->flush();

            return $this->redirectToRoute('projects_demo_index');
        }

        return $this->render('projects_demo/new.html.twig', [
            'projects_demo' => $projectsDemo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_demo_show", methods="GET")
     */
    public function show(ProjectsDemo $projectsDemo): Response
    {
        return $this->render('projects_demo/show.html.twig', ['projects_demo' => $projectsDemo]);
    }

    /**
     * @Route("/{id}/edit", name="projects_demo_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjectsDemo $projectsDemo): Response
    {
        $form = $this->createForm(ProjectsDemoType::class, $projectsDemo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projects_demo_edit', ['id' => $projectsDemo->getId()]);
        }

        return $this->render('projects_demo/edit.html.twig', [
            'projects_demo' => $projectsDemo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_demo_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjectsDemo $projectsDemo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectsDemo->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectsDemo);
            $em->flush();
        }

        return $this->redirectToRoute('projects_demo_index');
    }
}
