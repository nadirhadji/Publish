<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConnexionController extends Controller
{
    public function redirectionAction()
    {
        return $this->render('home_page.html.twig');
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
