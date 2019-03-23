<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;

class RemplirBaseController extends Controller
{
    public function remplirBaseAction()
    {
        //Création de l'entité Publication
        $publication=new Publication();
        $publication->setContenu("Ceci est une publication test pour l'affichage sur la page d'accueil");
        $publication->setDatePublication(new \DateTime());

        return $publication;
    }

}