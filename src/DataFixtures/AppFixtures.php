<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    private Generator $faker;

    public function __construct(){
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 50; $i++) { 
            $client = new Client();
            $client->setNom($this->faker->word())
                ->setPrenom('test')
                ->setMdp(mt_rand(0, 350))
                ->setMail('test')
                ->setTel('010208909');
        
                $manager->persist($client);
        }

        $manager->flush();
    }
}
