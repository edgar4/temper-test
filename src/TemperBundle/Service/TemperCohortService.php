<?php
namespace TemperBundle\Service;

/**
 * Created by PhpStorm.
 * User: edgarchris
 * Date: 10/8/17
 * Time: 13:41
 */
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TemperCohortService
{

    private $entityManager;
    private $router;
    private $container;

    public function __construct(EntityManager $entityManager, UrlGeneratorInterface $router, ContainerInterface $container)
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->container = $container;
    }


    public function get($start, $end)
    {
        $doctrine = $this->container->get('doctrine');
        $em = $doctrine->getEntityManager();

//        $cohorts = $doctrine->getRepository('TemperBundle:UserCohort')->findByRange($start, $end);
//
//        var_dump($cohorts);

        $sql = " 
         SELECT yearweek(`created_at`, 1) yw,
          COUNT(id) AS 'total_users',onboarding_perentage,count_applications,count_accepted_applications,created_at
       FROM user_cohort 
       WHERE created_at BETWEEN '$start' AND '$end'
       GROUP BY yw
    ";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if ($result) {
            return $result;
        }


    }


}