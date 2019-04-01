<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/03/2019
 * Time: 22:26
 */

namespace ConnexionBundle\Controller;


use ConnexionBundle\Form\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Template
     */
    public function searchAction(Request $request)
    {
        $search = NULL;
        $formulaire = $this->get('form.factory')->create(SearchType::class);

        $formulaire->handleRequest($request);
        if($formulaire->isSubmitted() && $formulaire->isValid())
        {
            $search = $formulaire['search']->getData();

            return $this->redirectToRoute('', array('search' => $search));

        }
        return $this->render('search.html.twig', ['formulaire' => $formulaire->createView()]);

    }
}