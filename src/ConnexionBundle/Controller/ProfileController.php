<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Génère la page de profil d'un utilisateur avec toutes les informations qu'elle doit afficher
     *
     * @Route("/user/{id}/profil", name="profil")
     *
     * @param $id l'identifiant de l'utilisateur propriétaire du profil
     *
     * @return Response retourne une page correspondant au profil de l'utilisateur d'identifiant $id
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ConnexionBundle:User')->find($id);

        //Affichage publication et commentaire
        $objet_publication = new PublicationController();
        $données_BDD = $objet_publication->indexAction(($em));
        $listPublications=$données_BDD[1];
        $listCommentaires=$données_BDD[0];

        return $this->render('pageProfil/profil.html.twig',array('commentaires' => $listCommentaires ,
            'publications' => $listPublications,
            'user'=> $user
        ));
    }


}
