<?php

namespace InscripcionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('InscripcionBundle:Default:index.html.twig');
    }
    public function homeAction()
    {
        return $this->render('InscripcionBundle:Default:home.html.twig');
    }
}
