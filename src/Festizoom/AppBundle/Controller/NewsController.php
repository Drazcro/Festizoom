<?php

namespace Festizoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Festizoom\AppBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class NewsController extends Controller
{
    /**
     * Recupère la news et l'affiche
     * @ParamConverter("news", options={"mapping": {"title": "utitle"}})
     */
    public function newsAction(News $news) {
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:News:news.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Dernières nouvelles',
                                        //News à afficher
                                        'news' => $news,
                                        //Nom pour le menu
                                        'page' => 'news'
                                    ]
                                  );
        return new Response($content);
    }

    /**
     * Récupère la liste des news et les affiche avec une pagination
     * @param int $pagNum -> Numéro de la page
     * @return Response
     */
    public function allNewsAction() {
        $newR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:News');
        //Compte le nombre de pages necessaires à la pagination
        $nbPagPage = $newR -> countNbPage();
        //Récupère les news correspondant à la page num
        $news = $newR -> getPageNews(1);
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:News:news.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Dernières nouvelles',
                                        //Liste des news
                                        'news' => $news,
                                        //Nombre de pages necessaires à la pagination
                                        'nbPagPage' => $nbPagPage,
                                        //Page courante pour la pagination
                                        'activePage' => 1,
                                        //Nom de la page pour le menu
                                        'page' => 'news'
                                    ]
                                   );
        return new Response($content);
    }

    /**
     * Récupère les news de la page PagNum
     * @Method({"POST"})
     * @param $pagNum
     * @return Response
     */
    public function newsPageAction($pagNum) {
        $newR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:News');
        //Compte le nombre de pages necessaires à la pagination
        $nbPagPage = $newR -> countNbPage();
        //Récupère les news correspondant à la page num
        $news = $newR -> getPageNews($pagNum);
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:News:ajax/newsContainer.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Dernières nouvelles',
                                        //Liste des news
                                        'news' => $news,
                                        //Nombre de pages necessaires à la pagination
                                        'nbPagPage' => $nbPagPage,
                                        //Page courante pour la pagination
                                        'activePage' => $pagNum
                                    ]
                                  );
        return new Response($content);
    }
}