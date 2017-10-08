<?php

namespace TemperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TemperBundle:Default:index.html.twig');
    }
}
