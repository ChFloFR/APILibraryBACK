<?php

namespace App\Controller;

use App\Repository\NationalityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

class NationalityController extends AbstractController
{
    /**
     * @param NationalityRepository $nationalitiesRepo
     * @return JsonResponse
     * @OA\Tag (name="Categorie")
     * @OA\Response(
     *     response="200",
     *     description = "OK"
     * )
     */
    #[Route('/api/nationality', name: 'app_nationality', methods:"GET")]
    public function findNationality(NationalityRepository $nationalitiesRepo): JsonResponse
    {
        $nationalities = $nationalitiesRepo->findAll();
        $nationsArray = [];
        foreach ($nationalities as $nationality){
            $nationsArray = [
                'id'=>$nationality->getId(),
                'name'=>$nationality->getNationality(),
                // vérifier en BDD la colonne
                'flag'=>$nationality->getFlag()
            ];   
            return new JsonResponse($nationsArray);
        }
        // vérifier la cohérence de $nationArray lignes 18 et 26
    }
}
