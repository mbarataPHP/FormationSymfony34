<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Newspaper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 * @Route("")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $newspapers = $this->getDoctrine()
            ->getRepository(Newspaper::class)
            ->getLastNewspapers();

        return $this->render('default/index.html.twig', array('newspapers'=>$newspapers));
    }
}


