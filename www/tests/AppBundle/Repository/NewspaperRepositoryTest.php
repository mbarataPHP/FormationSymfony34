<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Newspaper;
use AppBundle\Parent\TestParent;
use AppBundle\Repository\NewspaperRepository;

/**
 * Class NewspaperRepositoryTest
 * @package AppBundle\DataFixtures
 */
class NewspaperRepositoryTest extends TestParent
{
    /**
     * Ce test permet de tester la repo getLastNewspapers
     * @see NewspaperRepository::getLastNewspapers()
     */
    public function testLastNewspapers(){
        $this->loadFixtures();

        $newpaper1 = new Newspaper();
        $newpaper1->setTitre('test 1');

        $newpaper2 = new Newspaper();
        $newpaper2->setTitre('test 2');

        $newpaper3 = new Newspaper();
        $newpaper3->setTitre('test 3');

        $this->em->persist($newpaper1);
        $this->em->persist($newpaper2);
        $this->em->persist($newpaper3);
        $this->em->flush();

        $newpaper1->setCreatedAt(new \DateTime('2018-01-01'));
        $newpaper2->setCreatedAt(new \DateTime('2018-01-02'));
        $newpaper3->setCreatedAt(new \DateTime('2018-01-03'));
        $this->em->persist($newpaper1);
        $this->em->persist($newpaper2);
        $this->em->persist($newpaper3);
        $this->em->flush();


        /*
         * Debut des tests
         */

        $newpapers = $this->em->getRepository(Newspaper::class)->getLastNewspapers();

        $this->assertEquals(3, count($newpapers), 'je dois trouver 3 journaux');

        $this->assertEquals('2018-01-03', $newpapers[0]->getCreatedAt()->format('Y-m-d'), 'je dois trouver le troisième journal');
        $this->assertEquals('2018-01-02', $newpapers[1]->getCreatedAt()->format('Y-m-d'), 'je dois trouver le deuxième journal');
        $this->assertEquals('2018-01-01', $newpapers[2]->getCreatedAt()->format('Y-m-d'), 'je dois trouver le premier journal');
    }
}