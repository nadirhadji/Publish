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
    /**
     * @Route("/user/centreInteret", name="register-CI")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function CIAction(Request $request){

        $user = $this->getUser();
        $userId = $user->getId();
        $em = $this->getDoctrine()->getManager();


        // La méthode findAll retourne toutes les catégories de la base de données

        $ci = $em->getRepository('ConnexionBundle:Publication')->find($userId);

        // On boucle sur les catégories pour les lier à l'annonce

        foreach ($ci as $c) {
            $em->persist($c);
        }

        $em->flush();

        //Création de l'objet $message pour l' enregistrer dans dans la BDD
        $ci = new CentreInteret();

        //Creation utilisateur
        $repository= $this->getDoctrine()->getManager()->getRepository('ConnexionBundle:User');

        $ci->setUser($user);

        $formCI = $this->get('form.factory')->create(CIType::class, $ci);

        // Traitement du formulaire: Si la requête est en POST

        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            $formCI->handleRequest($request);

            // On vérifie si les valeurs entrées sont correctes
            if ($formCI->isValid()) {
                // On enregistre notre objet $message dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($ci);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Publication bien enregistrée.');

                // Redirection vers l'unique page de formulaire
                return $this->redirectToRoute('home-publication');
            }
        }



        return $this->render('CI.html.twig',array('ci' => $ci , 'form' => $formCI->createView() ) );


    }

}