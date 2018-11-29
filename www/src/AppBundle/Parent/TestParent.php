<?php
namespace AppBundle\Parent;

use AppBundle\DataFixtures\NewspaperFixtures;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;

/**
 * Class TestParent
 * @package AppBundle\Parent
 */
class TestParent extends WebTestCase
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected function setUp(){
        static::bootKernel();
        $this->runFixture();
        $this->em = self::$kernel->getContainer()->get('doctrine')->getManager();


    }

    protected function runFixture(){
        $this->loadFixtures(array(
            NewspaperFixtures::class
        ));
    }

    /**
     * @param User $user
     * @return \Symfony\Bundle\FrameworkBundle\Client
     */
    protected function logIn(User $user)
    {
        $client = static::createClient();
        $container = $client->getContainer();

        $session = $container->get('session');

        $loginManager = $container->get('fos_user.security.login_manager');
        $firewallName = $container->getParameter('fos_user.firewall_name');


        $loginManager->loginUser($firewallName, $user);

        // save the login token into the session and put it in a cookie
        $container->get('session')->set('_security_' . $firewallName,
            serialize($container->get('security.token_storage')->getToken()));
        $container->get('session')->save();
        $client->getCookieJar()->set(new Cookie($session->getName(), $session->getId()));
        return $client;
    }


}