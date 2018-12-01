<?php
namespace AppBundle\EventListener;

use AppBundle\Entity\Newspaper;
use AppBundle\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class NewspaperSubscriber
 * @package AppBundle\EventListener
 */
class NewspaperSubscriber implements EventSubscriber
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
        );
    }

    /**
     * @param LifecycleEventArgs $args
     * @see Events::prePersist
     */
    public function prePersist(LifecycleEventArgs $args){

        $entity = $args->getObject();

        if($entity instanceof Newspaper){

            if(!is_null($this->getUser())){
                $entity->setUser($this->getUser());
            }

        }

    }

    /**
     * Cette méthode permet de sortir un utilisateur
     * @return User|null
     */
    private function getUser(){
        $token = $this->tokenStorage->getToken();
        $user = null;

        if( !is_null($token) ){
            /** @var User $user */
            $user = $token->getUser();
        }

        return $user;


    }
}