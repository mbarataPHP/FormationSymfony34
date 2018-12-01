<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Newspaper", mappedBy="user")
     * @var Newspaper[]
     */
    private $newspapers;


    public function __construct()
    {
        parent::__construct();
        $this->newspapers = new ArrayCollection();
    }

    /**
     * @return Newspaper[]
     */
    public function getNewspapers(): array
    {
        return $this->newspapers;
    }

    /**
     * @param Newspaper[] $newspapers
     */
    public function setNewspapers(array $newspapers): void
    {
        $this->newspapers = $newspapers;
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
