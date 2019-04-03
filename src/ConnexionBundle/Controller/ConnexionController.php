<?php
namespace ConnexionBundle\Controller;
use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Form\DocumentType;
use ConnexionBundle\Form\PublicationType;
use ConnexionBundle\Entity\User;
use ConnexionBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Extension\Core\DataMapper\RadioListMapper;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use ConnexionBundle\Controller\PublicationController;

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
        $res = $objet_publication->indexAction(($em));
        $listPublications=$res[1];
        $listCommentaires=$res[0];
        //Nombre j aime et commentaire
        return $this->render('pageAccueil/home_page.html.twig',array('commentaires' => $listCommentaires ,
            'publications' => $listPublications,
            'form' => $form->createView(),
        ));
    }
}
