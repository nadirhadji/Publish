<?php

namespace Publish\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PublishPlatformBundle:Default:index.html.twig');
    }
}
