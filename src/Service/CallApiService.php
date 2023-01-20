<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class CallApiService
{

    // private $apiKey = "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV";
    
    // public function __construct(string $apiKey)
    // {
    //     $this->apiKey = $apiKey;
    // }

    public function getMostViewed()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nytimes.com/svc/mostpopular/v2/viewed/7.json', [
            'query' => [
                'api-key' => "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV",
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200) {
            return $response->toArray();
        }
        return null;
    }
    public function getByIsbn($isbn){
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nytimes.com/svc/books/v3/reviews.json', [
            'query' => [
                'api-key' => "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV",
                'isbn' => $isbn
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200) {
            return $response->toArray();
        }
        return null;
    }

    public function getByAuthor($author){
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nytimes.com/svc/books/v3/reviews.json', [
            'query' => [
                'api-key' => "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV",
                'author' => $author
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200) {
            return $response->toArray();
        }
        return null;
    }

    public function getByTitle($title){
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nytimes.com/svc/books/v3/reviews.json', [
            'query' => [
                'api-key' => "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV",
                'title' => $title
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200) {
            return $response->toArray();
        }
        return null;
    }

    public function getByDate($date){
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.nytimes.com/svc/books/v3/reviews.json', [
            'query' => [
                'api-key' => "OOruJAyWvpn2fP7n3E0FjV7BF1OEfkIV",
                'date' => $date
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if($statusCode == 200) {
            return $response->toArray();
        }
        return null;
    }


}