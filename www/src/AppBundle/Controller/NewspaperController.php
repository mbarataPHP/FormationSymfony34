<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Newspaper;
use AppBundle\Form\NewspaperType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class JournalController
 * @package AppBundle\Controller
 * @Route("journal")
 */
class NewspaperController extends Controller
{
    /**
     * Cette méthode permet de créer un journal
     * @Route("/ajout", name="newspaper_add")
     * @Security("has_role('ROLE_USER')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request){
        $newspaper = new Newspaper();

        $form = $this->createForm(NewspaperType::class, $newspaper);

        $form->handleRequest($request); //synchronise le form avec l'entité

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newspaper);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('newspaper/form.html.twig', array('form'=>$form->createView(), 'title'=>'Ajouter un journal'));

    }

    /**
     * Cette méthode permet de voir un journal
     * @Route("/voir/{id}", name="newspaper_show")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id){
        $newspaper = $this->getDoctrine()->getRepository(Newspaper::class)->find($id);

        return $this->render('newspaper/show.html.twig', array('newspaper'=>$newspaper));
    }


    /**
     * Cette méthode permet de modifier un journal
     * @Route("/modifier/{id}", name="newspaper_update")
     * @Security("has_role('ROLE_USER')")
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id, Request $request){

        $newspaper = $this->getDoctrine()->getRepository(Newspaper::class)->find($id);


        $form = $this->createForm(NewspaperType::class, $newspaper);

        $form->handleRequest($request); //synchronise le form avec l'entité

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newspaper);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('newspaper/form.html.twig', array('form'=>$form->createView(), 'title'=>'Modifier un journal'));
    }
}