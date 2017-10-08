<?php

namespace TemperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $series = array();
        $temperCohorts = $this->get('temper.user.cohort');
        $cohorts = $temperCohorts->get('2016-07-01', '2016-08-12');

        //echo "<pre>";


        foreach ($cohorts as $chart) {
            $onboarding = (int)$chart['onboarding_perentage'];
            $name = str_replace("2016", "week ", $chart['yw']);
            $chartCat[] = $name;
            $series[] = array("name" => $name, "data" => array($onboarding,$name));

        }

        return $this->render('TemperBundle:Default:index.html.twig', array(
            'chart' => json_encode($series),
        ));
    }


}
