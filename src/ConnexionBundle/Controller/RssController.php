<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26/03/2019
 * Time: 16:28
 */

namespace ConnexionBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ConnexionBundle\Form\SearchType;


class RssController extends Controller
{
    /**
     * @Route("/rss", name="home-rss")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewRSSAction(Request $request){

        $rss = simplexml_load_file('https://www.francetvinfo.fr/france.rss');

        $images = array();
        $item = array();
        $logo = array();
        $itemObj = array();
        $RSSItems = array();

        for($i = 0 ; $i < 10 ; $i++  ) {
            $images[$i] = $rss->channel->item[$i]->enclosure['url'];
            $item[$i] = $rss->channel->item[$i];
            $itemObj[0] = $images[$i];
            $itemObj[1] = $item[$i];
            $RSSItems[$i] = $itemObj;
        }

        return $this->render('rss.html.twig', array(
            'rssItems' => $RSSItems,
            'logo' => "https://www.lemonde.fr/mmpub/img/lgo/lemondefr_rss.gif"));

    }



}
