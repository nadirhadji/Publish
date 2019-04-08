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
     * @Route("/amis",name="amis")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function indexAction()

    {
        $em = $this->getDoctrine()->getManager();
        $addFriend = $em->getRepository('ConnexionBundle:Invitation');


        $users = $this->get('fos_user.user_manager');
        $allUsers = $users->findUsers();

        return $this->render('list_ami.html.twig',array(
            'users' =>$allUsers
        ));

    }
    /**
     * @Route("/amis/{id}", name="add")
     * @param User $user
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

    /**
     * @Route("/list/", name="list")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function amiListAction()
    {
        $friends = [];

        $repository = $this->getDoctrine()->getRepository('ConnexionBundle:Invitation');

        $friendship = $repository->findby(['user' => $this->getUser(),'isAccepted' => true]);

        foreach ($friendship as $friend) {
            array_push($friends, $friend->getFriend());
        }

        return $this->render('list_ami.html.twig', [
            'friends' => $friends
        ]);
    }

    /**
     * @Route("/Attente/", name="attente")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function attenteAction()
    {
        $friends = [];

        $repository = $this->getDoctrine()->getRepository('ConnexionBundle:Invitation');

        $friendship = $repository->findby(['user' => $this->getUser(),'isAccepted' => false]);

        foreach ($friendship as $friend) {
            array_push($friends, $friend->getFriend());
        }

        return $this->render('list_attente.html.twig', [
            'friends' => $friends
        ]);
    }

    /**
     * @Route("/accepter", name="accepter")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function accepterAction()
    {
        $friends = [];

        $repository = $this->getDoctrine()->getRepository('ConnexionBundle:Invitation');

        $friendship = $repository->findby(['friend' => $this->getUser(),'isAccepted' => false]);

        foreach ($friendship as $friend) {
            array_push($friends, $friend->getFriend());
        }

        return $this->render('list_attente.html.twig', [
            'friends' => $friends
        ]);


    }


}