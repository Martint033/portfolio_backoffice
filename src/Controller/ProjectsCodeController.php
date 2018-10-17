<?php

namespace App\Controller;

use App\Entity\ProjectsCode;
use App\Form\ProjectsCodeType;
use App\Repository\ProjectsCodeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projects/code")
 */
class ProjectsCodeController extends AbstractController
{
    /**
     * @Route("/", name="projects_code_index", methods="GET")
     */
    public function index(ProjectsCodeRepository $projectsCodeRepository): Response
    {
        return $this->render('projects_code/index.html.twig', ['projects_codes' => $projectsCodeRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projects_code_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projectsCode = new ProjectsCode();
        $form = $this->createForm(ProjectsCodeType::class, $projectsCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectsCode);
            $em->flush();

            return $this->redirectToRoute('projects_code_index');
        }

        return $this->render('projects_code/new.html.twig', [
            'projects_code' => $projectsCode,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_code_show", methods="GET")
     */
    public function show(ProjectsCode $projectsCode): Response
    {
        return $this->render('projects_code/show.html.twig', ['projects_code' => $projectsCode]);
    }

    /**
     * @Route("/{id}/edit", name="projects_code_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjectsCode $projectsCode): Response
    {
        $form = $this->createForm(ProjectsCodeType::class, $projectsCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projects_code_edit', ['id' => $projectsCode->getId()]);
        }

        return $this->render('projects_code/edit.html.twig', [
            'projects_code' => $projectsCode,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_code_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjectsCode $projectsCode): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectsCode->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectsCode);
            $em->flush();
        }

        return $this->redirectToRoute('projects_code_index');
    }
}
