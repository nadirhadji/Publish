<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Controller\RemplirBaseController;

class ConnexionController extends Controller
{
    /**
     * @Route("/user/home", name="redirection")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectionAction()
    {
        $remplirBase = new RemplirBaseController();
        $publication = $remplirBase->remplirBaseAction();

        //Récupération gestionnaire d'entités
        $em= $this->getDoctrine()->getManager();

        //Persistance de $publication
        $em->persist($publication);

        //Enregistrement dans BDD
        $em->flush();

        return $this->render('home_page.html.twig',array('publication' => $publication));

    }
}
