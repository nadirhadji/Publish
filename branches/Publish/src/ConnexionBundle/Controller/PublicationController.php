<?php

namespace ConnexionBundle\Controller;

use ConnexionBundle\Entity\Publication;
use ConnexionBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Controller\RemplirBaseController;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Symfony\Component\HttpFoundation\File\MimeType\ExtensionGuesser;


class ConnexionController extends Controller
{
    /**
     *
     *
     * @param Request $request
     * @return $this
     */
    public function publicationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $publication = new Publication();
        $form = $this->createForm(PublicationType::class, $publication);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $user_media_route = 'uploads/media/'.$user->getId().'_usermedia';

                // upload image
                $file = $form['image']->getData();
                if (!empty($file) && $file != null) {
                    $ext = $file->guessExtension(); // obtencion de extension

                    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                        $file_name = $user->getId().'_imgpublication_'.time().'.'.$ext;
                        $file->move($user_media_route.'/publications/images', $file_name);

                        $publication->setImage($file_name);
                    } else {
                        $publication->setImage(null);
                    }
                } else {
                    $publication->setImage(null);
                }

                // upload document
                $doc = $form['document']->getData();
                if (!empty($doc) && $doc != null) {
                    $ext = $doc->guessExtension(); // obtencion de extension

                    if ($ext == 'pdf') {
                        $file_name = $user->getId().'_docpublication_'.time().'.'.$ext;
                        $doc->move($user_media_route.'/publications/documents', $file_name);

                        $publication->setDocument($file_name);
                    } else {
                        $publication->setDocument(null);
                    }
                } else {
                    $publication->setDocument(null);
                }

                $publication->setUser($user);
                //$publication->setCreatedAt(new \DateTime("now")); rajouter dans la base de donnee pour que ça fonctionne

                $em->persist($publication);
                $flush = $em->flush();

                if ($flush == null) {
                    $status = 'reussi  !!';
                } else {
                    $status = 'Erreur !!';
                }

            } else {
                $status = 'erreur formulaire pas valide';
            }

            $this->session->getFlashBag()->add("status", $status);
            return $this->redirectToRoute('redirection');
        }

        $publications = $this->getPublications($request);

        return $this->render('home_page.html.twig', array(
            'form' => $form->createView(),
            'publications' => $publications
        ));
    }
}
