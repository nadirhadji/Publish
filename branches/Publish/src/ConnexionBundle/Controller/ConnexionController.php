<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Controller\RemplirBaseController;

class ConnexionController extends Controller
{
    /**
     * @Route("/user/home", name="redirection")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function redirectionAction()
    {
        //Récuperation des attribut cree dan remplirBaseController
        $remplirBase = new RemplirBaseController();
        $array = $remplirBase->remplirBaseAction();
        $publication1= $array["publication1"];
        $publication2= $array["publication2"];
        $publication3= $array["publication3"];

        //Création de l'entité User
        $repository= $this->getDoctrine()->getManager()->getRepository('ConnexionBundle:User');
        $user = $repository->find(4);

        //Mis en relation des publication avec l'utilisateur
        $publication1->setUser($user);
        $publication2->setUser($user);
        $publication3->setUser($user);

        //Récupération gestionnaire d'entités
        $em= $this->getDoctrine()->getManager();

        //Persistance de $publication
        $em->persist($publication1);
        $em->persist($publication2);
        $em->persist($publication3);
        //Enregistrement dans BDD
        $em->flush();

        $publications = array('publication1' => $publication1,'publication2' => $publication2,'publication3' => $publication3);

        return $this->render('home_page.html.twig',array('publications' => $publications));

    }
}
