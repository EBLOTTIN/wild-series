<?php

namespace App\DataFixtures;


use App\Entity\Program;

use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $program = new Program();
        $program->setTitle('Walking dead');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Game of throne');
        $program->setSynopsis('Pendant ce temps, complots et rivalités se jouent sur le continent pour s\'emparer du Trône de Fer');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('The witcher');
        $program->setSynopsis('Geralt de Riv, un chasseur de monstres mutant, poursuit son destin dans un monde chaotique où les humains se révèlent souvent plus vicieux que les bêtes.');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('Naruto');
        $program->setSynopsis('C\'est ainsi que douze ans plus tard, Naruto rêve de devenir le plus grand Hokage de Konoha afin que tous le reconnaissent à sa juste valeur.');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('One piece');
        $program->setSynopsis('Après avoir mangé un fruit du démon, il possède un pouvoir lui permettant de réaliser son rêve.');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);
        $manager->flush();

        $program = new Program();
        $program->setTitle('One punch man');
        $program->setSynopsis('Saitama est un jeune homme sans emploi et sans réelle perspective d\'avenir, jusqu\'au jour où il décide de prendre sa vie en main.');
        $program->setCategory($this->getReference('category_Animation'));
        $manager->persist($program);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
