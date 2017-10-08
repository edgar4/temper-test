<?php
namespace TemperBundle\Service;
/**
 * Created by PhpStorm.
 * User: edgarchris
 * Date: 10/8/17
 * Time: 13:41
 */
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


    public function get()
    {

        return $this->parse();
    }

    private function parse()
    {

    }

}