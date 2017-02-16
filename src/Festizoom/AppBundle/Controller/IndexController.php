<?php

namespace Festizoom\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class IndexController extends Controller
{
    /**
     * Affiche la page d'accueil
     * @return Response
     */
    public function indexAction() {
        $newsRepository = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:News');
        $news = $newsRepository->find3Last();
        $content = $this->get('templating')->render('FestizoomAppBundle:index:index.html.twig', ['title' => 'Estimate all electronic festivals', 'news' => $news, 'page' => 'index']);
        return new Response($content);
    }
}