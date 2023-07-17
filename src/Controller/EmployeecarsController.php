<?php

namespace App\Controller;

use App\Entity\Employeecars;
use App\Form\EmployeecarsType;
use App\Repository\EmployeecarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employeecars')]
class EmployeecarsController extends AbstractController
{
    #[Route('/', name: 'app_employeecars_index', methods: ['GET'])]
    public function index(EmployeecarsRepository $employeecarsRepository): Response
    {
        return $this->render('employeecars/index.html.twig', [
            'employeecars' => $employeecarsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employeecars_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employeecar = new Employeecars();
        $form = $this->createForm(EmployeecarsType::class, $employeecar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employeecar);
            $entityManager->flush();

            return $this->redirectToRoute('app_employeecars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employeecars/new.html.twig', [
            'employeecar' => $employeecar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employeecars_show', methods: ['GET'])]
    public function show(Employeecars $employeecar): Response
    {
        return $this->render('employeecars/show.html.twig', [
            'employeecar' => $employeecar,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employeecars_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employeecars $employeecar, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeecarsType::class, $employeecar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employeecars_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employeecars/edit.html.twig', [
            'employeecar' => $employeecar,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employeecars_delete', methods: ['POST'])]
    public function delete(Request $request, Employeecars $employeecar, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employeecar->getId(), $request->request->get('_token'))) {
            $entityManager->remove($employeecar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_employeecars_index', [], Response::HTTP_SEE_OTHER);
    }
}
