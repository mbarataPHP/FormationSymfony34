<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Newspaper;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
/**
 * Class NewspaperFixtures
 * @package AppBundle\DataFixtures
 */
class NewspaperFixtures extends Fixture implements DependentFixtureInterface
{
    const TITRE = 'titre';

    const USER = 'user';
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $datas = array(
            array(
                self::TITRE => 'titre1',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre2',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre3',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre4',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre5',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre6',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre7',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre8',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre9',
                self::USER => 'user1@test.fr'
            ),
            array(
                self::TITRE => 'titre10',
                self::USER => 'user2@test.fr'
            ),
            array(
                self::TITRE => 'titre11',
                self::USER => 'user3@test.fr'
            )
        );

        foreach($datas as $data){
            $newspaper = new Newspaper();

            $newspaper->setTitre($data[self::TITRE]);
            $newspaper->setUser($this->getReference($data[self::USER]));
            $manager->persist($newspaper);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}