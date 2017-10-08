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
        foreach ($cohorts as $key => $value) {
            $data = array();
            foreach ($value as $chart) {
                $data[] = (int)$chart['onboarding_perentage'];
            }
            $series[] = array("name" => $key, "data" => $data);

        }
        return $this->render('TemperBundle:Default:index.html.twig', array(
            'chart' => json_encode($series),
        ));
    }


}
