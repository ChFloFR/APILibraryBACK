<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    
    #[Route('/api/books/isbn/{isbn}', name: 'books_isbn', methods:['GET'])]
    
    public function infoBooks(Request $request, CallApiService $callApiService):JsonResponse{
        $isbn = $request->attributes->get('isbn');
        $books = $callApiService->getByIsbn($isbn);

        return new JsonResponse($books);
    }

    #[Route('/api/book/author/{author}', name: 'book_author', methods:['GET'])]
    public function infoBookByAuthor(Request $request, CallApiService $callApiService){
        $author = $request->attributes->get('author');
        $books = $callApiService->getByAuthor($author);

        return new JsonResponse($books);
    }

    #[Route('/api/book/title/{title}', name: 'book_title', methods:['GET'])]
    public function infoBookByTitle(Request $request, CallApiService $callApiService){
        $title = $request->attributes->get('title');
        $books = $callApiService->getByTitle($title);

        return new JsonResponse($books);
    }

    #[Route('/api/book/publication_date/{publication_date}', name: 'publication_date', methods:['GET'])]
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
