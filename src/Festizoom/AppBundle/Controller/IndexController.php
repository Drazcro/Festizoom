<?php
namespace Festizoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * Affiche la page d'accueil
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction() {
        $newsR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:News');
        //Récupère les 3 derniers news pour la page d'accueil
        $news = $newsR->find3Last();
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:index:index.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Estimate all electronic festivals',
                                        //News à afficher
                                        'news' => $news,
                                        //Nom pour le menu
                                        'page' => 'index'
                                    ]
                                  );
        return new Response($content);
    }
}