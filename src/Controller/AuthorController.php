<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use App\GlobalFunction\FunctionErrors;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\AuthorRepository;
use App\Entity\Author;


#[Route('/api/author')]
class AuthorController extends AbstractController
{
    /**
     * @param AuthorRepository $authorRepository
     * @return JsonResponse
     * @OA\Tag (name="Author")
     * @OA\Response(
     *     response="200",
     *     description = "OK"
     * )
     */
    #[Route('/', name: 'app_author', methods:"GET")]

    public function findAuthor(AuthorRepository $authorRepository): JsonResponse
    {
        $authors = $authorRepository->findAll();
        $authorArray = [];

        foreach ($authors as $author){
            $authorArray[]=[
            'id' => $author->getId(),
            'Nom' => $author->getNom(),
            'Prénom' => $author->getPrénom(),    
            ];
        }
        return new JsonResponse($authorArray);
    }
    /**
     * @param AuthorRepository $authorRepository
     * @param Request $request
     * @return JsonResponse
     * @OA\Tag (name="Author")
     * @OA\Response(
     *     response="200",
     *     description = "OK"
     * )
     */
    #[Route('/create/{nom}/{prenom}', name: 'app_create_author', methods: ['POST'])]
    public function createAuthor(AuthorRepository $authorRepository, Request $request): JsonResponse
    {
        $author = new Author();

        $author->setNom($request->attributes->get('nom'));
        $author->setPrénom($request->attributes->get('prenom'));

        // $author->setPathImg($request->attributes->get('pathImg'));

        $authorRepository->save($author, true);

        $authorArray = [
            "id" => $author->getId(),
            "name" => $author->getNom(),
            "Prénom"=> $author->getPrénom()
        ];
        return new JsonResponse($authorArray, 200);
    }

}
