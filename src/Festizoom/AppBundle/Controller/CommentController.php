<?php
/**
 * Created by PhpStorm.
 * User: Cédric
 * Date: 15/02/2017
 * Time: 21:59
 */

namespace Festizoom\AppBundle\Controller;

use Festizoom\AppBundle\Entity\Festival;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
    * @Method({"GET","POST"})
    * @ParamConverter("festival", options={"mapping": {"name": "uname"}})
    */
    public function commentPageAction(Festival $festival, $pagNum) {
        $commentR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Comment');
        //Compte le nombre de pages necessaires à la pagination
        $nbPagPage = $commentR->countNbPage($festival->getId());
        //Récupère les news correspondant à la page num
        $comments = $this->getPageComments($pagNum, $festival->getId());
        $content = $this->get('templating')
                    ->render('FestizoomAppBundle:Comment:commentContainer.html.twig',
                        ['title' => 'Festival',
                        'nbPagPage' => $nbPagPage,
                        'activePage' => $pagNum,
                        'festival' => $festival,
                        'comments' => $comments]);
        return new Response($content);
    }

    public function getPageComments($num, $festivalId) {
        $commentR = $this->getDoctrine()->getManager()->getRepository('FestizoomAppBundle:Comment');
        $firstEntry = ($num - 1) * 10;
        return $commentR->getLimit($firstEntry, 10, $festivalId);
    }
}