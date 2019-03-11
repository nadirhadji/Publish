<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Connexion/Default/index.html.twig');
    }

    public function testRoleUserAction()
    {
        return $this->render('test_roles/hello-world.html.twig');
    }

    public function testRoleAdminAction()
    {
        return $this->render('test_roles/hello-world-admin.html.twig');
    }
}
