<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/', name: 'app_book',  methods:"GET")]
    public function index(BookRepository $bookRepository): JsonResponse
    {
        $books = $bookRepository->findAll();
        $bookArray = [];

        foreach ($books as $book){
        $jsonBook = [
            'id' => $book->getId(),
            'titre' => $book->getTitre(),
            'auteur' => $book->getAuteur(),
            'catégorie' => $book->getCategorie()[0] === null ? : $book->getCategorie()()[0]->getId(),
            'éditeur' => $book->getEditeur(),
            '4e de couverture' => $book->getCoverText(),
            // 'enStock' => $book->getStock(),
            'pathImg' => $book->getPathImg(),
            'note' => null
        ];
        return new JsonResponse($bookArray);
        }
    }
    #[Route('/book/create', name: 'app_book',  methods:"POST")]

    public function createBook(){

    }
}
