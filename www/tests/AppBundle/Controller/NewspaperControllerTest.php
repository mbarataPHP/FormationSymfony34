<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Parent\TestParent;

/**
 * Class NewspaperControllerTest
 * @package Tests\AppBundle\Controller
 */
class NewspaperControllerTest extends TestParent
{
    public function testIndex(){

        /*
         * Je ne suis pas connecté
         */
        $client = $this->createClient();
        $client->request('GET', '/journal/ajout');
        $this->assertStatusCode(302, $client); //je simule une erreur de type 302

        $client->request('GET', '/journal/modifier/1');
        $this->assertStatusCode(302, $client); //je simule une erreur de type 302

        $client->request('GET', '/journal/voir/1');
        $this->assertStatusCode(200, $client);

        /*
         * Je suis connecté
         */
        $user = $this->em->getRepository(User::class)->findOneBy(array('username'=>'user1@test.fr'));
        $client = $this->logIn($user);

        $client->request('GET', '/journal/ajout');
        $this->assertStatusCode(200, $client);

        $client->request('GET', '/journal/modifier/1');
        $this->assertStatusCode(200, $client);

    }
}