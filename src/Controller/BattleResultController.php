<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\BattleResult;

class BattleResultController extends AbstractController
{
    /**
     * @Route("/battleResult", name="app_battle_result", methods={"GET"})
     */
    public function index()
    {
        return $this->render('battle_result/index.html.twig', [
            'controller_name' => 'BattleResultController',
        ]);
    }

    /**
     * @Route("/battleResult/{id}", name="app_battle_result_show", methods={"GET"})
     */
    public function show(BattleResult $battleResult)
    {

        return $this->render('battle_result/show.html.twig', [
            'battleResult' => $battleResult,
        ]);
    }
}
