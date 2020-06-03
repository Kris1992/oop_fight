<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Request, Response};
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\{MonsterRepository, HeroRepository};
use App\Services\BattleManager\BattleManagerInterface;

class BattleController extends AbstractController
{
    /**
     * @Route("/battle", name="app_battle", methods={"GET"})
     */
    public function index(MonsterRepository $monsterRepository, HeroRepository $heroRepository)
    {
        $monsters = $monsterRepository->findAll(); 
        $heros = $heroRepository->findAll();

        return $this->render('battle/index.html.twig', [
            'monsters' => $monsters,
            'heros' => $heros,
        ]);
    }

    /**
     * @Route("/battle", name="app_battle_start", methods={"POST"})
     */
    public function fight(Request $request, EntityManagerInterface $entityManager, BattleManagerInterface $battleManager, MonsterRepository $monsterRepository, HeroRepository $heroRepository): Response
    {
        $submittedToken = $request->request->get('token');
        $charactersData = $request->request->all();
        $monster = $monsterRepository->findOneBy(['id' => intval($charactersData['monsterSelect'])]);
        $hero = $heroRepository->findOneBy(['id' => intval($charactersData['heroSelect'])]);
        
        if (!$hero || !$monster) {
            $this->addFlash('warning','Choose characters.');
            return $this->redirectToRoute('app_battle');
        } 

        if ($this->isCsrfTokenValid('battle_start', $submittedToken)) {
            try {
                $battleResult = $battleManager->battle($hero, $monster);
                $entityManager->persist($battleResult);
                $entityManager->flush();

                return $this->redirectToRoute('app_battle_result_show', ['id' => $battleResult->getId() ]);

            } catch (\Exception $e) {
                $this->addFlash('warning',$e->getMessage());
            }

        } else {
            $this->addFlash('warning','Missed token.');
        }

        return $this->redirectToRoute('app_battle');

    }
}
