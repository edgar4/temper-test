<?php

namespace TemperBundle\Repository;

use Doctrine\ORM\Query\ResultSetMapping;

/**
 * UserCohortRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserCohortRepository extends \Doctrine\ORM\EntityRepository
{
    function findByRange($start, $end)
    {
//        $qb = $this->_em->createQueryBuilder();
//        $qb->select('yearweek(`createdAt`, 1) AS weekgroup')
//            ->from($this->_entityName, 'c');
//        $qb->andWhere('c.createdAt BETWEEN :start AND :end')
//            ->setParameter('start', $start)
//            ->setParameter('end', $end)
//            ->groupBy('c.createdAt');
//        return $qb->getQuery()->getResult();

        $rsm = new ResultSetMapping();
// build rsm here

        $query = $this->getDoctrine()->getManager()->createNativeQuery('SELECT id, name, discr FROM users WHERE name = ?', $rsm);
        $query->setParameter(1, 'romanb');

        $users = $query->getResult();

        return $users;


    }
}
