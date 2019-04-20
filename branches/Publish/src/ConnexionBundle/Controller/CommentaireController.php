<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Commentaire;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CommentaireController extends Controller
{

    /**
     * Permet de commenter une publication
     *
     * @Route("/homepage/{id}/commentaires",name="commentaire")
     *
     * @param $id l'identifiant de la publication qu'on veut commenter
     *
     * @return RedirectResponse
     *
     */
    public function addAction($id)
    {
        //Si la personne soumet un commentaire
        if(isset($_POST['envoiCommentaire'])) {
            //Préparation des attributs
            $em = $this->getDoctrine()->getManager();
            $publicationRepository = $em->getRepository('ConnexionBundle:Publication');
            $user = $this->getUser();
            $publication = $publicationRepository->find($id);

            //Traitement nouveau commentaire
            //Création de l'objet $commentaire pour l' enregistrer dans dans la BDD
            $commentaire = new Commentaire();
            $commentaire->setUser($user);
            $commentaire->setText(isset($_POST['commentaire']) ? $_POST['commentaire'] : NULL);
            $commentaire->setPublication($publication);
            $em->persist($commentaire);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Permet de modifier un commentaire
     *
     * @Route("/homepage/{id}/edit_commentaire",name="edit_commentaire")
     *
     * @param $id l'identifiant du commentaire à modifier
     *
     * @return RedirectResponse
     *
     */
    public function editAction($id)
    {
        //Si la personne soumet un commentaire modifié
        if(isset($_POST['envoiNouveauCommentaire'])) {
            $em = $this->getDoctrine()->getManager();
            $commentaireRepository = $em->getRepository('ConnexionBundle:Commentaire');
            $commentaire = $commentaireRepository->find($id);
            $commentaire->setText($_POST['nouveau_commentaire']);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Permet de supprimer un commentaire
     *
     * @Route("/homepage/{id}/suppresion_commentaire",name="suppression_commentaire")
     *
     * @param $id l'identifiant du commentaire à supprimer
     *
     * @return RedirectResponse
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaireRepository = $em->getRepository('ConnexionBundle:Commentaire');
        $commentaire = $commentaireRepository->find($id);
        //Suppression du commentaire dans la BDD
        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
