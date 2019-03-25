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
    public function viewAccueilAction()
    {
        $em = $this->getDoctrine()->getManager();

        // La méthode findAll retourne toutes les catégories de la base de données
        $listPublications = $em->getRepository('ConnexionBundle:Publication')->findAll();

        // On boucle sur les catégories pour les lier à l'annonce
        foreach ($listPublications as $publication) {
            $em->persist($publication);

        }

        $em->flush();

        return $this->render('home_page.html.twig',array('publications' => $listPublications));
    }
}
