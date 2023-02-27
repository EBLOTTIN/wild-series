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

        $saison = new saison();
        $saison->setNumber('1');
        $saison->setProgram($this->getReference('program_TheWitcher'));
        $saison->setYear('2019');
        $saison->setDescription('Une population hostile et un mage rusé accueillent Geralt dans la ville de Blaviken. Ciri voit son royaume en proie à la panique lorsque Nilfgaard s\'en prend à Cintra. Malmenée et humiliée, Yennefer trouve par hasard le moyen de s\'en sortir. L\'enfer attend Geralt alors qu\'il chasse un diable.');
        $this->addReference('saison1_TheWitcher', $saison);
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
