<?php

namespace App\DataFixtures;

use App\Entity\Saison;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;


class SaisonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $saison = new saison();
        $saison->setNumber('1');
        $saison->setProgram($this->getReference('program_WalkingDead'));
        $saison->setYear('2010');
        $saison->setDescription('Après avoir été blessé dans l’exercice de ses fonctions, le shérif Rick Grimes se réveille d’un coma de plusieurs semaines et découvre un monde post-apocalyptique.');
        $this->addReference('saison1_walkingDead', $saison);
        $manager->persist($saison);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
