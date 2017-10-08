<?php

namespace TemperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $cohort = $this->processCohorts();

        return $this->render('TemperBundle:Default:index.html.twig', array(
            'chart' => json_encode($cohort->series),
            'chart_label' => json_encode($cohort->labels)
        ));
    }

    function jsonAction()
    {
        $cohort = $this->processCohorts();
        $data = array(
            'chart' => $cohort->series,
            'chart_label' => $cohort->labels
        );
        return new JsonResponse($data);
    }


    private function processCohorts()
    {
        $series = $labels = array();
        $temperCohorts = $this->get('temper.user.cohort');
        $cohorts = $temperCohorts->get('2016-07-01', '2016-08-12');
        foreach ($cohorts as $key => $value) {
            $data = array();
            foreach ($value as $chart) {
                $data[] = (int)$chart['onboarding_perentage'];
                $labels[] = $key;
            }
            $series[] = array("name" => $key, "data" => $data);

        }

        return (object)array(
            'series' => $series,
            'labels' => $labels
        );
    }


}
