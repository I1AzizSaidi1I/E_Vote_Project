<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PersonneFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
       for($i = 0; $i < 100 ; $i++) {
           $person = new Person();
           $person->setFirstName($faker->firstName);
           $person->setLastName($faker->lastname);
           $person->setImg('./img/WIN_20231129_10_57_04_Pro.jpg');
           $person->setAge($faker->numberbetween(18,60));
           $manager->persist($person);

       }
        $manager->flush();
    }
}
