<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Form\DocumentType;
use ConnexionBundle\Form\PublicationType;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\DataMapper\RadioListMapper;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use ConnexionBundle\Controller\PublicationController;
use ConnexionBundle\Entity\Commentaire;
use ConnexionBundle\Form\CommentaireType;
use ConnexionBundle\Entity\Document;

class ConnexionController extends Controller
{

    public function publierAction()
    {
        //raitement nouvelle publication
        //Création de l'objet $publication pour l' enregistrer dans  la BDD
        $publication = new Publication();
        $publication->setDatePublication(new \DateTime());
        //Creation utilisateur
        $user = $this->getUser();
        $publication->setUser($user);

        return $publication;
    }

    public function viewPublicationAction(EntityManager $em)
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


    /**
     * @Route(name="commenter")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function commenterAction()
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

        return $this->redirectToRoute('redirection');    }



    /**
     * @Route("/user/home", name="redirection")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAccueilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Traitement nouvelle publication
        $publication=$this->publierAction();
        $form = $this->get('form.factory')->create(PublicationType::class, $publication);
        // Traitement du formulaire: Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            $form->handleRequest($request);

            // On vérifie si les valeurs entrées sont correctes
            if ( $form->isValid()) {
                // On enregistre notre objet $publication dans la base de données
                $em->persist($publication);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Publication bien enregistrée.');

                // Redirection vers la page d'accueil
                return $this->redirectToRoute('redirection');
            }
        }

        //Affichage publication et commentaire
        $res = $this->viewPublicationAction(($em));
        $listPublications=$res[1];
        $listCommentaires=$res[0];

        //Nombre j aime et commentaire

        return $this->render('pageAccueil/home_page.html.twig',array('commentaires' => $listCommentaires ,
                                                                    'publications' => $listPublications,
                                                                    'form' => $form->createView(),
                                                                    ));
    }


    /**
     * @Route("/user/home/{id}", name="nbcommentaire")
     */
    public function nbReactionCommentaireAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ConnexionBundle:Reaction');
        //Nombre j aime et commentaire
        $publication_courant=$repository->find($id);
        $nbCommentaire = count($repository->findBy(array('publication'=>$publication_courant),[],null,null));

        return $nbCommentaire;

    }






}
