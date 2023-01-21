<?php

namespace App\Controller;

use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/api/inscription', name: 'app_register')]
    public function index(): Response
    {
    $user = new User();
    // $form = $this->createForm(  type: RegisterType::class $user);

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'RegisterController',
        ]);
    }
}
