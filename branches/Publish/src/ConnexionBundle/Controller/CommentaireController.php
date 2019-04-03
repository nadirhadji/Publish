<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Commentaire;

class CommentaireController extends Controller
{
    /**
     * @Route(name="commenter")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ConnexionBundle:Publication');

        //Traitement nouveau commentaire
        //Création de l'objet $commentaire pour l' enregistrer dans dans la BDD
        $commentaire = new Commentaire();

        //Creation utilisateur
        $user = $this->getUser();
        $commentaire->setUser($user);
        $commentaire->setText(isset($_GET['commentaire']) ? $_GET['commentaire'] : NULL);
        $commentaire->setPublication($repository->find($_GET["publication"]));
        $em->persist($commentaire);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }
}
