<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Publication;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PublicationController extends Controller
{
    /**
     * Permet de recupérer les publications et les commentaires contenus dans la BDD
     *
     * @param $em le manager qui interragira avec la BDD
     *
     * @return array retourne un tableau contenant la liste de tous les commentaires et publications de la base
     */
    public function indexAction($em)
    {
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

    /**
     * Permet d'ajouter une publication
     *
     * @param $user l'auteur de la publication
     *
     * @return Publication la publication ajouté
     */
    public function addAction($user)
    {
        //Traitement nouvelle publication
        //Création de l'objet $publication pour l' enregistrer dans  la BDD
        $publication = new Publication();
        $publication->setDatePublication(new \DateTime());

        //Creation utilisateur
        $publication->setUser($user);

        return $publication;
    }

    /**
     * Permet de modifier une publication
     *
     * @Route("/homepage/{id}/edit_publication",name="edit_publication")
     *
     * @param $id l'identifiant de la publication à modifier
     *
     * @return RedirectResponse redirection vers la page d'accueil
     */
    public function editAction($id)
    {
        if(isset($_POST['envoiNouvellePublication'])) {
            $em = $this->getDoctrine()->getManager();
            $publicationRepository = $em->getRepository('ConnexionBundle:Publication');
            $publication = $publicationRepository->find($id);
            $publication->setContenu($_POST['nouvelle_publication']);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * Permet de supprimer une publication
     *
     * @Route("/homepage/{id}/suppresion_publication",name="suppression_publication")
     *
     * @param $id l'identifiant de la publication à supprimer
     *
     * @return RedirectResponse redirection vers la page d'accueil
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $publicationRepository = $em->getRepository('ConnexionBundle:Publication');
        $publication = $publicationRepository->find($id);
        $em->remove($publication);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }

}
