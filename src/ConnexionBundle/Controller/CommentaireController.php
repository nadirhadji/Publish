<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\Reaction;

class CommentaireController extends Controller
{
    /**
     * @Route(name="commenter")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction()
    {
        if(isset($_POST['envoiCommentaire']))
        {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('ConnexionBundle:Publication');

            //Traitement nouveau commentaire
            //Création de l'objet $commentaire pour l' enregistrer dans dans la BDD
            $commentaire = new Commentaire();

            //Creation utilisateur
            $user = $this->getUser();
            $commentaire->setUser($user);
            $commentaire->setText(isset($_POST['commentaire']) ? $_POST['commentaire'] : NULL);
            $commentaire->setPublication($repository->find(isset($_POST["publication"])? $_POST["publication"] : NULL));
            $em->persist($commentaire);
            $em->flush();

            return $this->redirectToRoute('homepage');

        }
        return $this->redirectToRoute('homepage');
    }
}
