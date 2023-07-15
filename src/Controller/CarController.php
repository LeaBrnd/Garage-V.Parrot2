<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\Car1Type;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car')]
class CarController extends AbstractController
{
    //#[Route('/', name: 'app_car_index', methods: ['GET'])]
    //public function index(CarRepository $carRepository): Response
    //{
    //    return $this->render('car/index.html.twig', [
         //   'cars' => $carRepository->findAll(),
       // ]);
   // }

   
    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function show(Car $car): Response

    {
        $comments = $car->getComments();
        return $this->render('car/show.html.twig', [
            'car' => $car,
            'comments'=> $comments
        ]);
    }
}