<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

use App\Entity\Episode;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $episode = new episode();
        $episode->setTitle('Passé décomposé');
        $episode->setNumber('1');
        $episode->setSaison($this->getReference('saison1_walkingDead'));
        $manager->persist($episode);
        $manager->flush();

        $episode = new episode();
        $episode->setTitle('Tripes');
        $episode->setNumber('2');
        $episode->setSaison($this->getReference('saison1_walkingDead'));
        $manager->persist($episode);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SaisonFixtures::class
        ];
    }
}
