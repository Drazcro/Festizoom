<?php
namespace Festizoom\AppBundle\Controller;

use Festizoom\AppBundle\Entity\Festival;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * Récupère les vidéos d'un festival de la page pagNum
     * @Method({"POST"})
     * @ParamConverter("festival", options={"mapping": {"name": "uname"}})
     */
    public function videoPageAction(Festival $festival, $pagNum) {
        $videoR = $this -> getDoctrine() -> getManager() -> getRepository('FestizoomAppBundle:Video');
        //Compte le nombre de pages necessaires à la pagination des vidéos
        $nbPagPage = $videoR -> countNbPage($festival -> getId());
        //Récupère les vidéos correspondant à la page num
        $videos = $videoR -> getPageVideos($pagNum, $festival -> getId());
        $content = $this -> get('templating')
                         -> render('FestizoomAppBundle:Video:ajax/videoContainer.html.twig',
                                    [
                                        //Titre de la page
                                        'title' => 'Festival',
                                        //Festival associé
                                        'festival' => $festival,
                                        //Nombre de pages necessaires à la pagination
                                        'nbVidPagPage' => $nbPagPage,
                                        //Page courante de la pagination
                                        'activeVidPage' => $pagNum,
                                        //Vidéos associées au festival
                                        'videos' => $videos
                                    ]
                                  );
        return new Response($content);
    }
}