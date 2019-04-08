<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Entity\Publication;

class CommentaireController extends Controller
{

    /**
     * Permet de commenter une publication
     *
     * @Route("/homepage/{id}/commentaires",name="commentaire")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addAction($id)
    {
        if(isset($_POST['envoiCommentaire'])) {

            $em = $this->getDoctrine()->getManager();
            $publicationRepository = $em->getRepository('ConnexionBundle:Publication');
            $commentaireRepository = $em->getRepository('ConnexionBundle:Commentaire');
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


            return $this->json([
                'code' => 200,
                'message' => 'commentaire bien ajouté',
                'commentaires' => $commentaireRepository->count(['publication' => $publication])
            ], 200);
        }

        return $this->json([
            'code' => 304,
            'message' => "commentaire non recu",

        ], 200);
    }

    /**
     * Permet de modifier un commentaire

     * @Route("/homepage/{id}/edit_commentaire",name="edit_commentaire")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function editAction($id)
    {
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
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaireRepository = $em->getRepository('ConnexionBundle:Commentaire');
        $commentaire = $commentaireRepository->find($id);
        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
