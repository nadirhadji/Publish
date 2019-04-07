<?php
namespace ConnexionBundle\Controller;
use ConnexionBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ConnexionController extends Controller
{
    /**
     * @Route("/user/home", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAccueilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Traitement nouvelle publication
        $objet_publication = new PublicationController();
        $publication=$objet_publication->addAction($this->getUser());
        $form = $this->get('form.factory')->create(PublicationType::class, $publication);

        // Traitement du formulaire: Si la requête est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien Requête <-> Formulaire
            $form->handleRequest($request);
            // On vérifie si les valeurs entrées sont correctes
            if ( $form->isValid()) {
                // On enregistre notre objet $publication dans la base de données
                $em->persist($publication);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'Publication bien enregistrée.');
                // Redirection vers la page d'accueil
                return $this->redirectToRoute('homepage');
            }
        }
        //Affichage publication et commentaire
        $données_BDD = $objet_publication->indexAction(($em));
        $listPublications=$données_BDD[1];
        $listCommentaires=$données_BDD[0];

        //Nombre j aime et commentaire
        $nbJAime = count ($em->getRepository('ConnexionBundle:Reaction')->findByPublication(226));

        return $this->render('pageAccueil/home_page.html.twig',array('commentaires' => $listCommentaires ,
            'publications' => $listPublications,
            'form' => $form->createView(),
            'nbJAime' => $nbJAime
        ));
    }
}
