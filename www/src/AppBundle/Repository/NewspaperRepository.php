<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Newspaper;

/**
 * Class NewspaperRepository
 * @package AppBundle\Repository
 */
class NewspaperRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * Cette méthode permet de sortir les derniers journaux
     * @return Newspaper[]
     */
    public function getLastNewspapers() : array {

        $queryBuilder = $this->createQueryBuilder('n')
            ->orderBy('n.createdAt', 'DESC');

        return $queryBuilder->getQuery()->getResult();

    }
}
