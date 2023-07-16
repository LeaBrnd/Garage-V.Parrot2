<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResearchController extends AbstractController
{
    #[Route('/research', name: 'app_research')]
    public function index(Request $request, CarRepository $carRepository): Response
    { 
        $search = $request->query->get('search');
        $cars = $carRepository->findBySearch($search);
        return $this->render('research/index.html.twig', [
            'controller_name' => 'ResearchController',
            'cars' => $cars
        ]);
    }
}
