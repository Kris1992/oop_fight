<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MonsterController extends AbstractController
{

    /**
     * @Route("/monster", name="app_monster", methods={"GET"})
     */
    public function index()
    {
        return $this->render('monster/index.html.twig', [
            'controller_name' => 'GETmon',
        ]);
    }

    /**
     * @Route("/monster", name="app_monster_create", methods={"POST"})
     */
    public function create()
    {
        return $this->render('monster/index.html.twig', [
            'controller_name' => 'HeroController',
        ]);
    }
    
    /**
     * @Route("/monster/{id}", name="app_monster_delete", methods={"DELETE"})
     */
    public function delete(string $id)
    {
        return $this->render('hero/index.html.twig', [
            'controller_name' => 'HeroController',
        ]);
    }

}
