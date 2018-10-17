<?php

namespace App\Controller;

use App\Entity\ProjectsImages;
use App\Form\ProjectsImagesType;
use App\Repository\ProjectsImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projects/images")
 */
class ProjectsImagesController extends AbstractController
{
    /**
     * @Route("/", name="projects_images_index", methods="GET")
     */
    public function index(ProjectsImagesRepository $projectsImagesRepository): Response
    {
        return $this->render('projects_images/index.html.twig', ['projects_images' => $projectsImagesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="projects_images_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $projectsImage = new ProjectsImages();
        $form = $this->createForm(ProjectsImagesType::class, $projectsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($projectsImage);
            $em->flush();

            return $this->redirectToRoute('projects_images_index');
        }

        return $this->render('projects_images/new.html.twig', [
            'projects_image' => $projectsImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_images_show", methods="GET")
     */
    public function show(ProjectsImages $projectsImage): Response
    {
        return $this->render('projects_images/show.html.twig', ['projects_image' => $projectsImage]);
    }

    /**
     * @Route("/{id}/edit", name="projects_images_edit", methods="GET|POST")
     */
    public function edit(Request $request, ProjectsImages $projectsImage): Response
    {
        $form = $this->createForm(ProjectsImagesType::class, $projectsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projects_images_edit', ['id' => $projectsImage->getId()]);
        }

        return $this->render('projects_images/edit.html.twig', [
            'projects_image' => $projectsImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projects_images_delete", methods="DELETE")
     */
    public function delete(Request $request, ProjectsImages $projectsImage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectsImage->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projectsImage);
            $em->flush();
        }

        return $this->redirectToRoute('projects_images_index');
    }
}
