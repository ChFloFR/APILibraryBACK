<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    
    #[Route('/book/isbn/{isbn}', name: 'book_isbn')]
    
    public function infoBook(Request $request, CallApiService $callApiService){
        $isbn = $request->attributes->get('isbn');
        $books = $callApiService->getByIsbn($isbn);

        return new JsonResponse($books);
    }

    #[Route('/book/author/{author}', name: 'book_author')]
    public function infoBookByAuthor(Request $request, CallApiService $callApiService){
        $author = $request->attributes->get('author');
        $books = $callApiService->getByAuthor($author);

        return new JsonResponse($books);
    }

    #[Route('/book/title/{title}', name: 'book_title')]
    public function infoBookByTitle(Request $request, CallApiService $callApiService){
        $title = $request->attributes->get('title');
        $books = $callApiService->getByTitle($title);

        return new JsonResponse($books);
    }

    #[Route('/book/publication_date/{publication_date}', name: 'publication_date')]
    public function infoBookByPubli_date(Request $request, CallApiService $callApiService){
    $publication_date = $request->attributes->get('publication_date');
    $books = $callApiService->getByDate($publication_date);

    return new JsonResponse($books);
}


//     public function infoBookByTitle(Request $request, CallApiService $callApiService){
//     $title = $request->attributes->get('title');
//     $books = $callApiService->getByTitle($title);
//     }
}
