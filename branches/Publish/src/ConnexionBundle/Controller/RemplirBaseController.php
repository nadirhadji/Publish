<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RemplirBaseController extends Controller
{
    public function remplirBaseAction()
    {
        //Création d'une première publication
        $publication1=new Publication();
        $publication1->setContenu("Test: Publication n°1 de l'utilisateur ");
        $publication1->setDatePublication(new \DateTime());

        //Création d'une deuxième publication
        $publication2=new Publication();
        $publication2->setContenu("Test: Publication n°2 de l'utilisateur ");
        $publication2->setDatePublication(new \DateTime());

        //Création d'une deuxième publication
        $publication3=new Publication();
        $publication3->setContenu("Test: Publication n°3 de l'utilisateur ");
        $publication3->setDatePublication(new \DateTime());

        return array("publication1"  => $publication1, "publication2" => $publication2, "publication3" => $publication2);

    }

}