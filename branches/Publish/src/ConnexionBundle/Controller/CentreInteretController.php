<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 28/03/2019
 * Time: 15:21
 */

namespace ConnexionBundle\Controller;


use ConnexionBundle\Entity\CentreInteret;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use ConnexionBundle\Form\CIType;
use ConnexionBundle\Form\SearchType;

class CentreInteretController extends Controller
{

    public function centreInteretAction()
    {
        //Traitement nouveau centre d'Interet
        //Création de l'objet $ci soit centre d'interet pour l' enregistrer dans  la BDD
        $ci = new CentreInteret();
        //Creation utilisateur
        $user = $this->getUser();
        $ci->setUser($user);
        return $ci;
    }

    public function viewCentreInteretActuelAction(EntityManager $em)
    {
        //Traitement centre d'Interet deja existants dans la base de données
        //Requete pour récupérer le centre d'interet contenus dans la BDD

        $user = $this->getUser();

        $ci = $em->getRepository('ConnexionBundle:CentreInteret')->findBy(array([$user->getId()]));

        // On persiste le centre d'interet

        $em->persist($ci);

        $em->flush();

        return $ci;
    }

    public function supprimerCentreInteretActuelAction()
    {
        //Traitement centre d'Interet deja existants dans la base de données
        //Requete pour supprimer le centre d'interet contenus dans la BDD

        //Récupération de l'objet user connecté
        $user = $this->getUser();

        //Récupération du Manager de doctrine
        $em = $this->getDoctrine()->getManager();

        //Récupération de la liste de CentreInteret reliée a l'utilisateur connecté
        $ci = $em->getRepository('ConnexionBundle:CentreInteret')->findBy(array('user' => $user));

        // On supprime le centre d'interet si il existe. cette condition est faite pour prendre en compte la création du premier objet
        if($ci != null) {

            foreach ($ci as $c) {
                $em->remove($c);
            }

            $em->flush();
        }
    }

    /**
     * @Route("/user/centreInteret", name="register-CI")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function CIAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        //Traitement nouvelle publication
        $ci=$this->centreInteretAction();

        $formCI = $this->get('form.factory')->create(CIType::class, $ci);

        // Traitement du formulaire: Si la requête est en POST

        if ($request->isMethod('POST')) {

            // On fait le lien Requête <-> Formulaire

            $formCI->handleRequest($request);

            // On vérifie si les valeurs entrées sont correctes

            if ( $formCI->isValid()) {

                // On enregistre notre objet $publication dans la base de données
                $this->supprimerCentreInteretActuelAction();

                $em->persist($ci);

                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'CentreInteret bien enregistrée.');

                // Redirection vers la page d'accueil
                return $this->redirectToRoute('home-rss');
            }
        }

        return $this->render('CI.html.twig',array('ci' => $ci , 'form' => $formCI->createView() ) );

    }

}