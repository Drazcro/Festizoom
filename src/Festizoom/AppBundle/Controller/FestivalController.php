<?php

namespace Festizoom\AppBundle\Controller;


use Festizoom\AppBundle\Entity\Festival;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class FestivalController extends Controller
{
    /**
     * Recupère le festival et l'affiche sur la page festival.html.twig
     * @ParamConverter("festival", options={"mapping": {"name": "uname"}})
     */
    public function festivalAction(Festival $festival) {
        $editions = $festival->getEditions();
        $commentR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Comment');
        $videoR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Video');
        //Compte le nombre de pages necessaires à la pagination
        $nbComPagPage = $commentR->countNbPage($festival->getId());
        $nbVidPagPage = $videoR->countNbPage($festival->getId());
        //Récupère les news correspondant à la page num
        $comments = $commentR->getPageComments(1, $festival->getId());
        $videos = $videoR->getPageVideos(1, $festival->getId());
        $content = $this->get('templating')
            ->render('FestizoomAppBundle:Festival:festival.html.twig', ['title' => 'Festival',
                                                                        'festival' => $festival,
                                                                        'editions' => $editions,
                                                                        'nbComPagPage' => $nbComPagPage,
                                                                        'activeComPage' => 1,
                                                                        'comments' => $comments,
                                                                        'nbVidPagPage' => $nbVidPagPage,
                                                                        'activeVidPage' => 1,
                                                                        'videos' => $videos,
                                                                        'page' => 'festival']);
        return new Response($content);
    }

    public function allFestivalsAction() {
        $festivalR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Festival');
        $festivals = $festivalR->getPageFestivals(1);
        $nbPagPage = $festivalR->countNbPage();
        $content = $this->get('templating')
            ->render('FestizoomAppBundle:Festival:festival.html.twig', ['title' => 'Festival',
                'festivals' => $festivals,
                'nbPagPage' => $nbPagPage,
                'activePage' => 1,
                'page' => 'festival']);
        return new Response($content);
    }

    public function festivalPageAction($pagNum) {
        $festivalR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Festival');
        $festivals = $festivalR->getPageFestivals($pagNum);
        $nbPagPage = $festivalR->countNbPage();
        $content = $this->get('templating')
            ->render('FestizoomAppBundle:Festival:festivalCommentContainer.html.twig', ['title' => 'Festival',
                'festivals' => $festivals,
                'nbPagPage' => $nbPagPage,
                'activePage' => $pagNum,
                'page' => 'festival']);
        return new Response($content);
    }
}