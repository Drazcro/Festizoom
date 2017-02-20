<?php
namespace Festizoom\AppBundle\Controller;

use Festizoom\AppBundle\Entity\Festival;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class FestivalController extends Controller
{
    /**
     * Recupère le festival et l'affiche
     * @Method({"GET"})
     * @ParamConverter("festival", options={"mapping": {"name": "uname"}})
     */
    public function festivalAction(Festival $festival) {
        $commentR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Comment');
        $videoR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Video');
        //Récupération des éditions correspondant au festival
        $editions = $festival -> getEditions();
        //Compte le nombre de pages necessaires à la pagination des commentaires
        $nbComPagPage = $commentR -> countNbPage($festival->getId());
        //Compte le nombre de pages necessaires à la pagination des vidéos
        $nbVidPagPage = $videoR -> countNbPage($festival->getId());
        //Récupère les commentaires correspondant à la page num
        $comments = $commentR -> getPageComments(1, $festival->getId());
        //Récupère les vidéos correspondant à la page num
        $videos = $videoR -> getPageVideos(1, $festival->getId());
        $content = $this -> get('templating')
                         ->render('FestizoomAppBundle:Festival:festival.html.twig',
                                   [
                                      //Titre de la page
                                      'title' => 'Festival',
                                      //Festival associé
                                      'festival' => $festival,
                                      //Editions associées au festival
                                      'editions' => $editions,
                                      //Nombre de pages pour la pagination des commentaires
                                      'nbComPagPage' => $nbComPagPage,
                                      //Page active de la pagination des commentaires
                                      'activeComPage' => 1,
                                       //Commentaires liés au festival
                                      'comments' => $comments,
                                      //Nombre de pages pour la pagination des vidéos
                                      'nbVidPagPage' => $nbVidPagPage,
                                      //Page active de la pagination des commentaires
                                      'activeVidPage' => 1,
                                      //Vidéos liées au festival
                                      'videos' => $videos,
                                      //Nom pour le menu
                                      'page' => 'festival'
                                   ]
                                 );
        return new Response($content);
    }

    /**
     * Récupère les festivals et les affiche avec une pagination
     * @Method({"GET"})
     * @return Response
     */
    public function allFestivalsAction() {
        $festivalR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Festival');
        //Récupère les festivals correspondant à la page de base 1
        $festivals = $festivalR -> getPageFestivals(1);
        //Compte le nombre de pages necessaires à la pagination des festivals
        $nbPagPage = $festivalR -> countNbPage();
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:Festival:festival.html.twig',
                                   [
                                      //Titre de la page
                                      'title' => 'Festival',
                                      //Festivals pour la page
                                      'festivals' => $festivals,
                                      //Nombre de pages pour la pagination des festivals
                                      'nbPagPage' => $nbPagPage,
                                      //Page active de la pagination
                                      'activePage' => 1,
                                      //Nom pour le menu
                                      'page' => 'festival'
                                   ]
                                 );
        return new Response($content);
    }

    /**
     * Récupère et affiche les festivals de la page pagNum
     * @Method({"POST"})
     * @param $pagNum
     * @return Response
     */
    public function festivalPageAction($pagNum) {
        $festivalR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Festival');
        //Récupère les festivals corrspondant à la page pagNum
        $festivals = $festivalR -> getPageFestivals($pagNum);
        //Compte le nombre de pages necessaires à la pagination des festivals
        $nbPagPage = $festivalR -> countNbPage();
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:Festival:ajax/festivalCommentContainer.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Festival',
                                        //Festivals pour la page
                                        'festivals' => $festivals,
                                        //Nombre de pages pour la pagination des festivals
                                        'nbPagPage' => $nbPagPage,
                                        //Page active de la pagination
                                        'activeVidPage' => $pagNum,
                                    ]
                                  );
        return new Response($content);
    }
}