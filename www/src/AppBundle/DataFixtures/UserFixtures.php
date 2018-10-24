<?php
namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

/**
 * Class UserFixtures
 * @package AppBundle\DataFixtures
 */
class UserFixtures extends Fixture
{
    const USERNAME = 'username';
    const PASSWORD = 'password';
    const ROLES = 'roles';

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $datas = array(
            array(
                self::USERNAME => 'user1@test.fr',
                self::PASSWORD => '123456',
                self::ROLES => array('ROLE_USER')
            ),
            array(
                self::USERNAME => 'user2@test.fr',
                self::PASSWORD => '123456',
                self::ROLES => array('ROLE_USER')
            ),
            array(
                self::USERNAME => 'user3@test.fr',
                self::PASSWORD => '123456',
                self::ROLES => array('ROLE_USER')
            )
        );

        foreach($datas as $data){
            $user = new User();
            $user->setEmail($data[self::USERNAME]);
            $user->setUsername($data[self::USERNAME]);
            $user->setPlainPassword($data[self::PASSWORD]);
            $user->setRoles($data[self::ROLES]);
            $user->setEnabled(true);

            $manager->persist($user);
        }

        $manager->flush();

    }
}