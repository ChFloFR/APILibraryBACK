<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

class NationalityController extends AbstractController
{
    #[Route('/api/nationality', name: 'app_nationality', methods:"GET")]
    public function findNationality(): JsonResponse
    {
        return $this->render('nationality/index.html.twig', [
            'controller_name' => 'NationalityController',
        ]);
    }
}
