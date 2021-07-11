<?php

namespace App\DataFixtures;

use App\Entity\Equipage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $em)
    {
        // $product = new Product();
        // $manager->persist($product);
        $team1 = new Equipage();
        $team1->setNom('Eleftheria');
        $em->persist($team1);


        $team2 = new Equipage();
        $team2->setNom('Gennadios');
        $em->persist($team2);

        $team3 = new Equipage();
        $team3->setNom('Lysimachos');
        $em->persist($team3);

        $team4 = new Equipage();
        $team4->setNom('Lysimachos');
        $em->persist($team4);

        $em->flush();
    }
}
