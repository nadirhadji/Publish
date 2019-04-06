<?php
namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Reaction;
use ConnexionBundle\Repository\ReactionRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ConnexionBundle\Entity\Publication;

class ReactionController extends Controller
{

    /**
     * Permet de réagir ou annuler la reaction par rapport à une publication
     *
     * @Route("/homepage/{id}/likes",name="post_like")
     *
     * @param Publication $publication
     * @param EntityManager $em
     * @param ReactionRepository $reactionRepository
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addAction(Publication $publication )
    {
        $em = $this->getDoctrine()->getManager();
        $reactionRepository= $em->getRepository('ConnexionBundle:Reaction');

        $user= $this->getUser();

        if ($publication->isLikedByUser($user))
        {
            $reaction = $reactionRepository->findOneBy(
                [
                    'publication' => $publication,
                    'user' => $user
                ]);

            $em->remove($reaction);
            $em->flush();

            return $this->json([
                'code' => 200,
                'message' => 'Like bien supprimé',
                'reactions' => $reactionRepository->count(['publication' => $publication])
                ], 200);
        }

        $reaction = new Reaction();
        $reaction->setPublication($publication)
                ->setUser($user);

        $em->persist($reaction);
        $em->flush();

        return $this->json([
            'code' => 200 ,
            'message' => 'Like bien ajouté',
            'reactions'=> $reactionRepository->count(['publication'=>$publication])
        ],200);
    }
}
