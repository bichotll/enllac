<?php

namespace Bic\EnllacBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BicEnllacBundle:Default:index.html.twig', array('name' => $name));
    }
}
