<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @param CategorieRepository $categorieRepository
     * @return JsonResponse
     * @OA\Tag (name="Categorie")
     * @OA\Response(
     *     response="200",
     *     description = "OK"
     * )
     */
    #[Route('/api/categorie', name: 'app_categorie', methods:"GET")]
    public function findCategorie(CategorieRepository $categorieRepository): JsonResponse
    {
        $categories = $categoriesRepo->findAll();
        $nationsArray = [];
        foreach ($categories as $categorie){
            $nationsArray = [
                'id'=>$categorie->getId(),
                'name'=>$categorie->getCategorie(),
            ];   
            return new JsonResponse($nationsArray);
        }
    }
    * @param CategorieRepository $
    * @param Request $request
    * @param FunctionErrors $errorCode
    * @return JsonResponse
    * @OA\Tag (name="Categorie")
    * @OA\Response(
    *     response="200",
    *     description = "OK"
    * )
    */
   #[Route('/create/{name}', name: 'app_create_categorie', methods: ['POST'])]
   public function create(
       CategorieRepository $categorieRepository, Request $request, GlobalFunction\FunctionErrors $errorCode
   ): JsonResponse
   {
       $categorie = new Categorie();

       $categorie->setName($request->attributes->get('name'));

       $categorie->setPathImage($request->attributes->get('pathImage'));

       $categorieRepository->save($categorie, true);


       $categorieArray = [
           "id" => $categorie->getId(),
           "name" => $categorie->getName()
       ];

       return new JsonResponse($categorieArray, 200);
   }

   /**
    * @param CategorieRepository $categorieRepository
    * @param Request $request
    * @param FunctionErrors $errorCode
    * @return JsonResponse
    * @OA\Tag (name="Categorie")
    * @OA\Response(
    *     response="200",
    *     description = "OK"
    * )
    */
   #[Route('/update/{id}/{name}', name: 'app_update_categorie', methods: ['POST'])]
   public function update(
       CategorieRepository $categorieRepository, Request $request, GlobalFunction\FunctionErrors $errorCode
   ): JsonResponse
   {
       $categorie = $categorieRepository->find($request->attributes->get('id'));

       $categorie->setName($request->attributes->get('name'));

       $categorieRepository->save($categorie, true);

       $categorieArray = [
           "id" => $categorie->getId(),
           "name" => $categorie->getName()
       ];

       return new JsonResponse($categorieArray, 200);
   }

   /**
    * @param CategorieRepository $categorieRepository
    * @param FunctionErrors $errorCode
    * @param Request $request
    * @return JsonResponse
    * @OA\Tag (name="Categorie")
    * @OA\Response(
    *     response="200",
    *     description = "OK"
    * )
    * @author
    */
   #[Route('/delete/{id}', name: 'app_delete_categorie', methods: ['DELETE'])]
   public function removeCategory(
       CategorieRepository $categorieRepository, GlobalFunction\FunctionErrors $errorCode, Request $request
   ): JsonResponse
   {
       $categorie = $categorieRepository->find($request->attributes->get('id'));
       $categorieRepository->remove($categorie, true);

       return new JsonResponse(null, 200);
   }


   /**
    * @param CategorieRepository $categorieRepository
    * @param Request $request
    * @param FunctionErrors $errorCode
    * @return JsonResponse
    * @OA\Tag (name="Categorie")
    * @OA\Response(
    *     response="200",
    *     description = "OK"
    * )
    */
   #[Route('/updateAvailable/{id}/{available}/',
       name: 'app_update_category_available', methods: "POST")]
   public function updateAvailableCategory(
       CategorieRepository $categorieRepository, Request $request, FunctionErrors $errorCode
   ): JsonResponse
   {
       $categorie = $categorieRepository->find($request->attributes->get('id'));

       if (!$categorie) {
           return $errorCode->generateCodeError003();
       }

       $categorieRepository->save($categorie, true);

       $categorieArray = [
           "id" => $categorie->getId(),
           "name" => $categorie->getName()
       ];

       return new JsonResponse($categorieArray, 200);
   }

    
}
