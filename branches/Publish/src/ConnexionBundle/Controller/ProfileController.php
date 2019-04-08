<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Form\AddType;

use ConnexionBundle\Entity\Invitation;
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

        $formADD = $this->get('form.factory')->create(AddType::class);

        if ($request->isMethod('POST')) {

            // On fait le lien Requête <-> Formulaire

            $formADD->handleRequest($request);

            // On vérifie si les valeurs entrées sont correctes

            if ( $formADD->isValid()) {

                // On enregistre notre objet $publication dans la base de données
                $this->addFriend($id);


                // Redirection vers la page d'accueil
            }
        }

        return $this->render('pageProfil/profil.html.twig',array('commentaires' => $listCommentaires ,
            'publications' => $listPublications,
            'nbJAime' => $nbJAime,
            'user'=> $user,
            'form' => $formADD->createView()
        ));
    }

    /**
     * @Route("/add/{id}", name="add_friend")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addFriend($id)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $this->getUser();
        $user2 = $em->getRepository('ConnexionBundle:User')->find($id);


        $adduser = new Invitation();
        $adduser->setFriend($user2)
            ->setUser($users)
            ->setIsAccepted(false);

        $em->persist($adduser);
        $em->flush();

    }

    public function isFrindWith($user) {

        $em = $this->getDoctrine()->getManager();
        $frinds = $em->getRepository('ConnexionBundle:Invitation')->find(['u']);



    }
}
