<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    public function index()
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises()
    {
        return $this->render('pro_stage/entreprises.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/formations", name="formations")
     */
    public function formations()
    {
        return $this->render('pro_stage/formations.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
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

}
