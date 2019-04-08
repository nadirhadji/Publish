<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ConnexionBundle\Form\PublicationType;

class ProfileController extends Controller
{
    /**
     * @Route("/user/{id}/profil", name="profil")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ConnexionBundle:User')->find($id);

        //Traitement nouvelle publication
        $objet_publication = new PublicationController();
        $publication=$objet_publication->addAction($user);

        //Affichage publication et commentaire
        $données_BDD = $objet_publication->indexAction(($em));
        $listPublications=$données_BDD[1];
        $listCommentaires=$données_BDD[0];

        //Nombre j aime et commentaire
        $nbJAime = count ($em->getRepository('ConnexionBundle:Reaction')->findByPublication(226));

        return $this->render('pageProfil/profil.html.twig',array('commentaires' => $listCommentaires ,
            'publications' => $listPublications,
            'nbJAime' => $nbJAime,
            'user'=> $user
        ));    }
}
