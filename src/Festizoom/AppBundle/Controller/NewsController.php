<?php

namespace Festizoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Festizoom\AppBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class NewsController extends Controller
{
    /**
     * Recupère la news et l'affiche sur la page news.html.twig
     * @ParamConverter("news", options={"mapping": {"title": "utitle"}})
     */
    public function newsAction(News $news) {
        $content = $this->get('templating')
                        ->render('FestizoomAppBundle:News:news.html.twig', ['title' => 'Dernières nouvelles', 'news' => $news, 'page' => 'news']);
        return new Response($content);
    }

    /**
     * Récupère la liste des news et les affiche avec une pagination
     * @param int $pagNum -> Numéro de la page
     * @return Response
     */
    public function allNewsAction($pagNum) {
        $newR = $this->getDoctrine()
                     ->getManager()
                     ->getRepository('FestizoomAppBundle:News');
        //Compte le nombre de pages necessaires à la pagination
        $nbPagPage = $newR->countNbPage();
        //Récupère les news correspondant à la page num
        $news = $this->getPageNews($pagNum);
        $content = $this->get('templating')
                        ->render('FestizoomAppBundle:News:news.html.twig',
                                 ['title' => 'Dernières nouvelles',
                                  //Liste des news
                                  'news' => $news,
                                  //Nombre de pages necessaires à la pagination
                                  'nbPagPage' => $nbPagPage,
                                  //Page courante pour la pagination
                                  'activePage' => $pagNum,
                                  //Nom de la page pour le menu
                                  'page' => 'news']);
        return new Response($content);
    }

    /**
     * Récupère la liste des news correspondant à une page de pagination
     * @param $num
     * @return mixed
     */
    public function getPageNews($num) {
        $newR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:News');
        $firstEntry = ($num - 1) * 8;
        return $newR->getLimit($firstEntry, 8);
    }
}