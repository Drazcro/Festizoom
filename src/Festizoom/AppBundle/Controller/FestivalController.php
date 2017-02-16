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
        //Compte le nombre de pages necessaires à la pagination
        $nbPagPage = $commentR->countNbPage($festival->getId());
        //Récupère les news correspondant à la page num
        $comments = $this->getPageComments(1, $festival->getId());
        $content = $this->get('templating')
            ->render('FestizoomAppBundle:Festival:festival.html.twig', ['title' => 'Festival',
                                                                        'festival' => $festival,
                                                                        'editions' => $editions,
                                                                        'nbPagPage' => $nbPagPage,
                                                                        'activePage' => 1,
                                                                        'comments' => $comments,
                                                                        'page' => 'festival']);
        return new Response($content);
    }

    public function getPageComments($num, $festivalId) {
        $commentR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Comment');
        $firstEntry = ($num - 1) * 10;
        return $commentR->getLimit($firstEntry, 10, $festivalId);
    }
}