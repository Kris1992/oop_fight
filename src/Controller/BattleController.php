<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BattleController extends AbstractController
{
    /**
     * @Route("/battle", name="battle")
     */
    public function index()
    {
        return $this->render('battle/index.html.twig', [
            'controller_name' => 'BattleController',
        ]);
    }
}
