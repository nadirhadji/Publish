<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends Controller
{
    /**
     * @Route("/home", name="redirection")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectionAction()
    {
        //Création de l'entité Publication
        $publication=new Publication();
        $publication->setContenu("Ceci est une publication test pour l'affichage sur la page d'accueil");
        $publication->setDatePublication(new \DateTime());

        //Récupération gestionnaire d'entités
        $em=$this->getDoctrine()->getManager();

        //Persistance de $publication
        $em->persist($publication);

        //Enregistrement dans BDD
        $em->flush();

        return $this->render('home_page.html.twig',array('publication' => $publication));

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
