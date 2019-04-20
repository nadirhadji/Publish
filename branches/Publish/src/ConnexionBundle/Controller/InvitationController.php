<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Invitation;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Reponse;

class InvitationController extends Controller

{

    /**
     * Permet d'afficher les utilisateurs qui sont dans ma liste d'ami
     *
     * @Route("/mes_amis",name="mes_amis")
     *
     * @return Response une page qui affiche la liste d'ami
     *
     */
    public function indexAction()
    {
        //Initialisation
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $mesAmis = array();

        //On parcours la liste des invitations et on ajoute au tableau les users qui sont dans la liste
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
     * Permet d'ajouter un utilisateur dans sa liste d'ami
     *
     * @Route("/ajout_ami/{id}", name="ajout_ami")
     *
     * @param $id l'identifiant de l'utilisateur qu'on veut ajouter
     *
     * @return Response retourne une redirection vers la même page de profil
     *
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
     * Permet d'annuler l'envoi d'une invitation
     *
     * @Route("/annuler_invitation/{id}", name="annuler_invitation")
     *
     * @param $id l'identifiant de l'utilisateur qu'on ne veut plus inviter
     *
     * @return RedirectResponse
     */
    public function annulerInvitationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $ami = $em->getRepository('ConnexionBundle:User')->find($id);
        $listInvitation = $invitationRepo->findAll();

        //Recherche de l'invitation correspondant dans la BDD
        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getExpediteur()==$user && $invitation->getDestinataire()==$ami)
            {
                $em->remove($invitation);
                $em->flush();
            }
        }

        return $this->redirectToRoute('profil', array('id' => $id));

    }


    /**
     * Permet d'afficher les invitations en attente de confirmation
     *
     * @Route("/Attente", name="attente")
     *
     * @return Response retourne une redirection vers une page ou la liste d'attente s'affiche
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
     * Permet d'obtenir la liste des invitations qu'on a envoyé, en attente de confirmation
     *
     * @return array Un tableau contenant les utilisateurs destinataires des invitations
     *
     */
    public function mesInvitationsEnAttente()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $mesInvitation = array();

        //On parcours la liste des invitations et enregistrement de ceux qui n'ont pas été accepté
        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getExpediteur()==$user && !($invitation->getIsAccepted()))
                array_push($mesInvitation,$invitation->getDestinataire());
        }
        return $mesInvitation;
    }

    /**
     * Permet d'obtenir la liste des invitations en attente de confirmation
     *
     * @return array un tableau avec les utilisateurs qui souhaitent m'ajouter comme ami
     */
    public function leurInvitationsEnAttente()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $listInvitation = $invitationRepo->findAll();
        $leurInvitation = array();

        //On parcours la liste des invitations et enregistrement de ceux qui n'ont pas été accepté
        foreach ($listInvitation as $invitation)
        {
            if ($invitation->getDestinataire()==$user && !($invitation->getIsAccepted()))
                array_push($leurInvitation,$invitation->getExpediteur());
        }
        return $leurInvitation;
    }

    /**
     * Permet d'accepter une invitation
     *
     * @Route("/accepter_ami/{id}", name="accepter_ami")
     *
     * @param $id l'identifiant de l'utilisateur dont on veut accepter la demande
     *
     * @return RedirectResponse retourne une redirection vers le profil de cet utilisateur
     */

    public function accepterAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $ami = $em->getRepository('ConnexionBundle:User')->find($id);
        $listInvitation = $invitationRepo->findAll();

        //Recherche de l'invitation correspondant dans la BDD
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

    /**
     * Permet de supprimer un utilisateur de sa liste d'ami
     *
     * @Route("/supprimer_ami/{id}", name="supprimer_ami")
     *
     * @param $id l'identifiant de l'utilisateur à supprimer
     *
     * @return RedirectResponse retourne une redirection vers le profil de cet utilisateur
     *
     */
    public function deleteAmi($id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $invitationRepo = $em->getRepository('ConnexionBundle:Invitation');
        $ami = $em->getRepository('ConnexionBundle:User')->find($id);
        $listInvitation = $invitationRepo->findAll();

        //Recherche de l'invitation correspondant dans la BDD
        foreach ($listInvitation as $invitation)
        {
            if (($invitation->getExpediteur()==$user && $invitation->getDestinataire()==$ami) || ($invitation->getExpediteur()==$ami && $invitation->getDestinataire()==$user))
            {
                $em->remove($invitation);
                $em->flush();
            }
        }
        return $this->redirectToRoute('profil', array('id' => $id));
    }

}