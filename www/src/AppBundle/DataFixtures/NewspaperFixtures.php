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

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $datas = array(
            array(
                self::TITRE => 'titre1'
            ),
            array(
                self::TITRE => 'titre2'
            ),
            array(
                self::TITRE => 'titre3'
            ),
            array(
                self::TITRE => 'titre4'
            ),
            array(
                self::TITRE => 'titre5'
            ),
            array(
                self::TITRE => 'titre6'
            ),
            array(
                self::TITRE => 'titre7'
            ),
            array(
                self::TITRE => 'titre8'
            ),
            array(
                self::TITRE => 'titre9'
            ),
            array(
                self::TITRE => 'titre10'
            ),
            array(
                self::TITRE => 'titre11'
            )
        );

        foreach($datas as $data){
            $newspaper = new Newspaper();

            $newspaper->setTitre($data[self::TITRE]);
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