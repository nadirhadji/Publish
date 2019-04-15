<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/03/2019
 * Time: 22:26
 */

namespace ConnexionBundle\Controller;


use ConnexionBundle\Entity\Document;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Form\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Length;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ConnexionBundle\Repository\UserRepository;

class SearchController extends Controller
{
    /**
     * @Template
     */
    public function index(Request $request)
    {
        $search = NULL;
        $formulaire = $this->get('form.factory')->create(SearchType::class);

        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $search = $formulaire['search']->getData();

            return $this->redirectToRoute('', array('search' => $search));

        }
        return $this->render('search.html.twig', ['formulaire' => $formulaire->createView()]);

    }

    /**
     * @Route("/search",
     *  options = { "expose" = true },
     *  name = "ajax_search_article",
     * )
     */
    public function searchFriend(Request $request)
    {
        $term = $request->query->get('UserVal')['term'];

        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('ConnexionBundle:User');

        $result = $repo->findUser($term);

        $resultat = array();
        $i = 0;

        foreach ($result as $user) {

            $obj = [];

            $image = $user->getImage();
            $image = $image->getFichier();

            $obj[0] = $image;
            $obj[1] = $user;

            $resultat[$i] = $obj;

            $i++;

        }

        return $this->render("search.json.twig", ['users' => $resultat ]);
    }
}