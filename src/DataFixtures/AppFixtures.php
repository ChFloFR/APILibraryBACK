<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0; $i < 20; $i++){
            $book = new Book();
            $book->setTitre("Titre " . $i);
            $book->setCoverText("4e de couverture :" . $i);
            $book->setAuteur("Auteur " . $i);
            $book->setEditeur("Editions " . $i);
            $manager->persist($book);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
