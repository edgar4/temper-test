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

        $cohorts = $this->determineCohorts($start, $end);
        $cohortData = array();

        foreach ($cohorts as $cohort) {
            $cohort = (object)$cohort;
            $name = str_replace("2016", "week", $cohort->yw);
            $cohortData[$name] = $this->getCohortData($cohort->created_at);

        }
        return $cohortData;


    }

    private function determineCohorts($start, $end)
    {
        $doctrine = $this->container->get('doctrine');
        $em = $doctrine->getEntityManager();
        $sql = " 
         SELECT yearweek(`created_at`, 1) yw,created_at
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

        return false;

    }

    private function getCohortData($cohort)
    {
        $doctrine = $this->container->get('doctrine');
        $em = $doctrine->getEntityManager();
        $sql = " 
        SELECT onboarding_perentage,count_applications,count_accepted_applications,created_at
       FROM user_cohort 
       WHERE created_at = '$cohort'";

        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }


}