<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Publication;

class PublicationController extends Controller
{
    public function indexAction( $em)
    {
        //Traitement publications et commentaires deja existants dans la base de données
        //Requete pour récupérer toutes les publications et commentaires contenus dans la BDD
        $listPublications = $em->getRepository('ConnexionBundle:Publication')->findBy([],array('datePublication'=>'desc'),null,null);
        $listCommentaires = $em->getRepository('ConnexionBundle:Commentaire')->findAll();
        // On boucle sur les publications et les commentaires pour les persister
        foreach ($listPublications as $publication) {
            $em->persist($publication);
        }
        foreach ($listCommentaires as $commentaire) {
            $em->persist($commentaire);
        }
        $em->flush();
        return array($listCommentaires,$listPublications);
    }

    public function addAction($user)
    {
        //raitement nouvelle publication
        //Création de l'objet $publication pour l' enregistrer dans  la BDD
        $publication = new Publication();
        $publication->setDatePublication(new \DateTime());
        //Creation utilisateur
        $publication->setUser($user);
        return $publication;
    }

}
