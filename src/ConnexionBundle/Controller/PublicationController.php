<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Publication;

class PublicationController extends Controller
{
    public function indexAction($em)
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
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editAction($id)
    {
        if(isset($_POST['envoiNouveauPublication'])) {
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
     * @return \Symfony\Component\HttpFoundation\JsonResponse
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
