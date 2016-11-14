<?php

namespace Foggyline\ShipmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FoggylineShipmentBundle:Default:index.html.twig');
    }
}
