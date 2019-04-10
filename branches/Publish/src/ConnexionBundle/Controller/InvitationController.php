<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Friendship;
use ConnexionBundle\Entity\Invitation;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Reponse;

class InvitationController extends Controller

{

    /**
     * Affichage de ma liste d'ami
     *
     * @Route("/mes_amis",name="mes_amis")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()

    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $mesAmis = array();

        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getExpediteur()==$user  && $invitation->getIsAccepted())
                array_push($mesAmis,$invitation->getDestinataire());

            if ($invitation->getDestinataire()==$user   && $invitation->getIsAccepted())
                array_push($mesAmis,$invitation->getExpediteur());
        }

        return $this->render('list_ami.html.twig',array(
            'mesAmis' =>$mesAmis
        ));

    }

    /**
     * Permet d'ajouter un ami
     *
     * @Route("/ajout_ami/{id}", name="ajout_ami")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addFriendAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $ami = $em->getRepository('ConnexionBundle:User')->find($id);

        //On crée l'invitation
        $invitation = new Invitation();
        $invitation->setExpediteur($user)
            ->setDestinataire($ami)
            ->setIsAccepted(false);

        $em->persist($invitation);
        $em->flush();

        return $this->redirectToRoute('profil', array('id' => $id));

    }

    /**
     * Permet d'afficher les demandes en attente
     *
     * @Route("/Attente", name="attente")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function attenteAction()
    {
        $mesInvitations = $this->mesInvitationsEnAttente();
        $leurInvitations = $this->leurInvitationsEnAttente();

        return $this->render('list_attente.html.twig', [
            'mesInvitations' => $mesInvitations,
            'leurInvitations' => $leurInvitations
        ]);
    }

    /**
     * Retourne un tableau avec la liste de mes invitations en attente de confirmation par les autres
     * @return array
     */
    public function mesInvitationsEnAttente()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $mesInvitation = array();

        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getExpediteur()==$user && !($invitation->getIsAccepted()))
                array_push($mesInvitation,$invitation->getDestinataire());
        }
        return $mesInvitation;
    }

    /**
     * Retourne un tableau avec la liste des invitations qu'on m'a envoyé
     * @return array
     */
    public function leurInvitationsEnAttente()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $leurInvitation = array();

        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getDestinataire()==$user && !($invitation->getIsAccepted()))
                array_push($leurInvitation,$invitation->getExpediteur());
        }
        return $leurInvitation;
    }

    /**
     * Permet d'accepter une invitation
     * @Route("/accepter_ami/{id}", name="accepter_ami")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function accepterAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $ami = $em->getRepository('ConnexionBundle:User')->find($id);
        $listInvitation = $invitationRepo->findAll();


        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getExpediteur()==$ami && $invitation->getDestinataire()==$user)
            {
                $invitation->setIsAccepted(true);
                $em->persist($invitation);
                $em->flush();
            }
        }
        return $this->redirectToRoute('profil', array('id' => $id));
    }

}