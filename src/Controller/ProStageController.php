<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Entity\Formation;
use App\Entity\Entreprise;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('pro_stage/accueil.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/entreprises",name="liste_entreprise")
     */
    public function listeEntrep()
    {
        $repositoryEntrep = $this->getDoctrine()->getRepository(Entreprise::class)->findAll();
        return $this->render('pro_stage/Liste/ListeEntreprise.html.twig', ['entreprise'=>$repositoryEntrep]);
    }
    /**
     * @Route("/entreprise/{id}", name="entreprise")
     */
    public function entreprise($id)
    {
        return $this->render('pro_stage/entreprise.html.twig', [
            'controller_name' => 'ProStageController',
            'idEntrep' => $id
        ]);
    }
    /**
     * @Route("/formations",name="liste_formation")
     */
    public function listeFormations()
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class)->findAll();
        return $this->render('pro_stage/Liste/ListeFormation.html.twig', ['formation'=>$repositoryFormation]);
        }
    /**
     * @Route("/formation/{id}", name="formation")
     */
    public function formation($id)
    {
        return $this->render('pro_stage/formation.html.twig', [
            'controller_name' => 'ProStageController',
            'idFormation' => $id
        ]);
    }
    /**
     * @Route("/stages", name="liste_stage")
     */
    public function listeStages()
    {
        $repositoryStages = $this->getDoctrine()->getRepository(Stage::class)->findAll();
        return $this->render('pro_stage/Liste/ListeStage.html.twig', ['stage'=>$repositoryStages]);
    }
    /**
     * @Route("/stage/{id}", name="stage")
     */
    public function stage($id)
    {
        return $this->render('pro_stage/stage.html.twig', [
            'controller_name' => 'ProStageController',
            'idStage' => $id
        ]);
    }
    /**
     * @Route("/create/entreprise", name="createEntreprise")
     */
    public function createEntreprise()
    {
        $entrep = new Entreprise();

        $formEntrep  = $this->createFormBuilder($entrep)
                            ->add('nom', TextType::class, ['attr' => ['placeholder']])
                            ->add('activite', TextType::class)
                            ->add('adresse', TextType::class)
                            ->add('site', EmailType::class)
                            ->getForm();

        return $this->render('pro_stage/createEntreprise.html.twig', [
            'vueForm' => $formEntrep->createView()
        ]);
    }

}