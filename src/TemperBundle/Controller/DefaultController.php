<?php

namespace TemperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $temperCohorts = $this->get('temper.user.cohort');
        return $this->render('TemperBundle:Default:index.html.twig', array(
            'cohorts' => $temperCohorts->get()
        ));
    }


}
