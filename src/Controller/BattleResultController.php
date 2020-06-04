<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\BattleResultRepository;
use Symfony\Component\HttpFoundation\{Response, Request};
use App\Entity\BattleResult;

class BattleResultController extends AbstractController
{
    /**
     * @Route("/battleResult", name="app_battle_result", methods={"GET"})
     */
    public function index(BattleResultRepository $battleResultRepository, Request $request, PaginatorInterface $paginator)
    {
        $battleResultQuery = $battleResultRepository->findAllQuery();

        $pagination = $paginator->paginate(
            $battleResultQuery, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('perPage', 5)/*limit per page*/
        );

        return $this->render('battle_result/index.html.twig', [
            'pagination' => $pagination,
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
