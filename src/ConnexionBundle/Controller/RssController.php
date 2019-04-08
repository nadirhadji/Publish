<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/03/2019
 * Time: 16:28
 */

namespace ConnexionBundle\Controller;


use ConnexionBundle\Entity\CentreInteret;
use ConnexionBundle\Entity\FluxRSS;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Form\SearchType;


class RssController extends Controller
{

    public function rssLoader(string $url) {

            $RSSItems = array();

            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();

            $rss = simplexml_load_file($url);

            $images = array();
            $item = array();
            $itemObj = array();

            //Insertion de 10 flux RSS liée au centre d'interet
            for ($i = 0; $i < 10; $i++) {

                //Récupération de l'image ainsi que de l'item a partir du FluxRss (XML)

                $images[$i] = $rss->channel->item[$i]->enclosure['url'];
                $item[$i] = $rss->channel->item[$i];
                $itemObj[0] = $images[$i];
                $itemObj[1] = $item[$i];
                $RSSItems[$i] = $itemObj;

                //Fin récupération

                //Verification de l'existance de cette item dans la bdd
                $estDansBase = false;

                //Récupération de la liste des Flux RSS ayant le meme nom que celui qu'on a récupéré a l'itération i de la boucle
                $ItemBuffer = $em->getRepository('ConnexionBundle:FluxRSS')->findBy(array('nom' => $item[$i]->title));

                //Si la liste retournée par le repository est vide pour l'iteration i, cela veut dire que cette item n'est pas en base donc doit etre ajoutée
                if($ItemBuffer == null)
                    $estDansBase = true;

                if($estDansBase) {
                    //Création de l'objet FluxRSS a inserer en bdd

                    $fluxRss = new FluxRSS();
                    $fluxRss->setNom($item[$i]->title);
                    $fluxRss->setUrl($item[$i]->link);

                    //conversion de la date en DateTime
                    $date = new \DateTime($item[$i]->pubDate);
                    //fin conversion

                    $fluxRss->setDateFluxRss($date);
                    $fluxRss->setDescription($item[$i]->description);
                    $fluxRss->setURLImage($images[$i]);
                    $fluxRss->setVille("Paris");

                    //Fin de création

                    //Insertion de l'item liée au flux rss en bdd

                    $em = $this->getDoctrine()->getManager();

                    $em->persist($fluxRss);

                    $em->flush();

                    //Fin insertion
                }
            }

            return  $RSSItems;

        }

    /**
     * @Route("/rss", name="home-rss")
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function viewRSSAction(Request $request)
    {

        //Récupération des centres d'interet de l'utilisateur connecté

        $RSSItems = array();

        $RSSNews = array();

        $RSSSport = array();

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $ci = $em->getRepository('ConnexionBundle:CentreInteret')->findBy(array('user' => $user));


        //Fin de récupération


        // Teste si l'utilisateur s'interesse a l'actualité, si oui on lui retournera les items liées au flux Rss du jourmal LeMonde
        if ($ci[0]->getIsNews()) {

            $RSSNews = $this->rssLoader('https://www.lemonde.fr/cinema/rss_full.xml');
        }

        if ($ci[0]->getIsSport()) {

            $RSSSport = $this->rssLoader('https://www.lequipe.fr/rss/actu_rss.xml');

        }

        if ($ci[0]->getIsTravel()) {

            $RSSSport = $this->rssLoader('http://o.nouvelobs.com/voyage/rss.xml');

        }

        if ($ci[0]->getIsMusic()) {

            $RSSSport = $this->rssLoader('https://www.nouvelobs.com/mode/rss.xml');

        }

        $RSSItems = array_merge($RSSNews,$RSSSport);

        return $this->render('rss.html.twig', array(
            'rssItems' => $RSSItems,
            'logo' => "https://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif"));
    }

}
