<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 05/10/2017
 * Time: 14:56
 */
    namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;



/*é herdeira da classe controller do pacote FrameWorkBundle */
class testeController extends Controller
{
    /**
     * @return Response
     * @Route("/index/{nomeURL}")
     */
    public function showAction($nomeURL)
    {
        $anotacao = ["DIA das criancas é também dia dos pais, dos professores",
                    "mas também dos animais, sim dos animais por que",
                    "sempre você olha pra uma crianca há sempre uma figura oculta...",
                    "que é UM cachorro atrás...",
                    "e isso é uma COISA muito importante"];

        $funFact='esse tipo de lula é conhecida por ter um <strong>de seus *tentáculos* amputado</strong>.';
      /*  $funFact=$this->container->get('markdown.parser')->transform($funFact);
      essa é a maneira chata de se fazer
      */
      //e essa a otimizada:
        $funFact=$this->get('markdown.parser')->transform($funFact);
        return $this->render('index/show.html.twig', array(
            'name' => $nomeURL,
            'nota' => $anotacao,
            'funFact' => $funFact
        ));


    }
    //esta é outra forma de se fazer:
    /*public function showAction($nomeURL){

        $templating = $this->container->get('templating');
        $html = $templating->render(('index/show.html.twig'), array('name' => $nomeURL));
        return new Response ($html);

    }
    */
    /*
     * Bundles sao um tipo de pacotes do symfony que acrescentam servicos a aplicacao desenvolvida, e podem ser entendidos como ferramentas.
     * os bundles fornecem servicos como: translator(tradutor), twig(renderizador HTML), router, form factory.
     * */

}