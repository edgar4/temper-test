<?php

namespace TemperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {


        $temperCohorts = $this->get('temper.user.cohort');
        $temperCohorts->get('2016-07-01', '2016-08-12');
        exit;

        return $this->render('TemperBundle:Default:index.html.twig', array(
            'cohorts' => $temperCohorts->get()
        ));
    }


}
