<?php

namespace ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ReactionController extends Controller
{
    /**
     * @Route(name="reaction")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reactionAction()
    {
        //Traitement des réactions après clic sur bouton
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ConnexionBundle:Publication');

        //Création Réaction
        $reaction= new Reaction();
        $user= $this->getUser();
        $reaction->setType("aime");
        $reaction->setUser($user);
        $reaction->setPublication($repository->find(143));

        $em->persist($reaction);

        $em->flush();

        return $this->redirectToRoute('redirection');
    }
}
