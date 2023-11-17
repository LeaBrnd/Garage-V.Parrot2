<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\CarFilterType;

class CarFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('price', IntegerType::class, [
            'required' => false,
        ])
        ->add('brand', TextType::class, [
            'required' => false,
        ])
        ->add('fuel', TextType::class, [
            'required' => false,
        ])
        ->add('mileage', IntegerType::class, [
            'required' => false,
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here, if needed.
        ]);
    }

    // src/Controller/AdminCarController.php

// ...

public function index(Request $request, CarRepository $carRepository): Response
{
    $form = $this->createForm(CarFilterType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Récupérez les données du formulaire
        $data = $form->getData();

        // Utilisez les données pour filtrer la liste de voitures
        $filteredCars = $carRepository->findByFilter($data);
    } else {
        // Si le formulaire n'est pas soumis, affichez toutes les voitures
        $filteredCars = $carRepository->findAll();
    }

    return $this->render('admin_car/index.html.twig', [
        'form' => $form->createView(),
        'cars' => $filteredCars,
    ]);
}

}
