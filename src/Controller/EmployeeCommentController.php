<?php

namespace App\Controller;

use App\Entity\EmployeeComment;
use App\Form\EmployeeCommentType;
use App\Repository\EmployeeCommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employee/comment')]
class EmployeeCommentController extends AbstractController
{
    #[Route('/', name: 'app_employee_comment_index', methods: ['GET'])]
    public function index(EmployeeCommentRepository $employeeCommentRepository): Response
    {
        return $this->render('employee_comment/index.html.twig', [
            'employee_comments' => $employeeCommentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employee_comment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employeeComment = new EmployeeComment();
        $form = $this->createForm(EmployeeCommentType::class, $employeeComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employeeComment);
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employee_comment/new.html.twig', [
            'employee_comment' => $employeeComment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_comment_show', methods: ['GET'])]
    public function show(EmployeeComment $employeeComment): Response
    {
        return $this->render('employee_comment/show.html.twig', [
            'employee_comment' => $employeeComment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employee_comment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EmployeeComment $employeeComment, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeeCommentType::class, $employeeComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employee_comment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employee_comment/edit.html.twig', [
            'employee_comment' => $employeeComment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_comment_delete', methods: ['POST'])]
    public function delete(Request $request, EmployeeComment $employeeComment, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employeeComment->getId(), $request->request->get('_token'))) {
            $entityManager->remove($employeeComment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_employee_comment_index', [], Response::HTTP_SEE_OTHER);
    }
}
