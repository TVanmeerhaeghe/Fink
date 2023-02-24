<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tatoueur = new Tatoueur();
        $tatoueur->setNom('Tatoueur #1')
            ->setPrenom('test')
            ->setMdp('test')
            ->setMail('test')
            ->setTel('0000000')
            ->setAdresse('test')
            ->setStyle('test')
            ->setNomDuSalon('test')
            ->setDescription('test');

        $manager->persist($tatoueur);

        $manager->flush();
    }
}
