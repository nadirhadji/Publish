<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Form\SearchType;


class PublicationController extends Controller
{
    /**
     * @Route("/user/home", name="home-publication")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function viewAccueilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // La méthode findAll retourne toutes les catégories de la base de données

        $listPublications = $em->getRepository('ConnexionBundle:Publication')->findAll();

        // On boucle sur les catégories pour les lier à l'annonce

        foreach ($listPublications as $publication) {
            $em->persist($publication);
        }

        $em->flush();

        //Création de l'objet $message pour l' enregistrer dans dans la BDD
        $publication = new Publication();
        $publication->setDatePublication(new \DateTime());

        //Creation utilisateur
        $repository= $this->getDoctrine()->getManager()->getRepository('ConnexionBundle:User');
        $user = $this->getUser();
        $publication->setUser($user);

        $form = $this->get('form.factory')->create(PublicationType::class, $publication);

        // Traitement du formulaire: Si la requête est en POST

        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            $form->handleRequest($request);

            // On vérifie si les valeurs entrées sont correctes
            if ($form->isValid()) {
                // On enregistre notre objet $message dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($publication);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Publication bien enregistrée.');

                // Redirection vers l'unique page de formulaire
                return $this->redirectToRoute('home-publication');
            }
        }

        return $this->render('home_page.html.twig',array('publications' => $listPublications , 'formPublication' => $form->createView()) );
    }
}
