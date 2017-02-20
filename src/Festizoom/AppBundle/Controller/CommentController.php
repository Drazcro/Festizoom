<?php
namespace Festizoom\AppBundle\Controller;

use Festizoom\AppBundle\Entity\Festival;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
    * Recupère et affiche avec pagination les commentaires pour un festival
    * @Method({"POST"})
    * @ParamConverter("festival", options={"mapping": {"name": "uname"}})
    */
    public function commentPageAction(Festival $festival, $pagNum) {
        $commentR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Comment');
        //Compte le nombre de pages necessaires à la pagination des commentaires
        $nbPagPage = $commentR -> countNbPage($festival->getId());
        //Récupère les commentaires correspondant à la page pagNum
        $comments = $commentR -> getPageComments($pagNum, $festival->getId());
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:Comment:ajax/commentContainer.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Festival',
                                        //Nombre de pages necessaires à la pagination
                                        'nbComPagPage' => $nbPagPage,
                                        //Page courante de la pagination
                                        'activeComPage' => $pagNum,
                                        //Festival associé aux commentaires
                                        'festival' => $festival,
                                        //Commentaires associés au festival
                                        'comments' => $comments
                                    ]
                                  );
        return new Response($content);
    }
}