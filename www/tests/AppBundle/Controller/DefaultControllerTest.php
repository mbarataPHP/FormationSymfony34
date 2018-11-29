<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Parent\TestParent;

/**
 * Class DefaultControllerTest
 * @package Tests\AppBundle\Controller
 */
class DefaultControllerTest extends TestParent
{
    /**
     * Ce test permet de tester si la route "homepage" fonctionne toujours
     */
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode(), 'la route "homepage" ne fonctionne plus.');
    }
}
