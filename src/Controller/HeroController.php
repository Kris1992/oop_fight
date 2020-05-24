<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\HeroRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Hero;


use App\Services\Builder\HeroBuilder;
use App\Services\Builder\Director;

class HeroController extends AbstractController
{
    
    /**
     * @Route("/hero", name="app_hero", methods={"GET"})
     */
    public function index(HeroRepository $heroRepository, Request $request, PaginatorInterface $paginator)
    {
        $heroQuery = $heroRepository->findAllQuery();

        $pagination = $paginator->paginate(
            $heroQuery, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('perPage', 10)/*limit per page*/
        );

        $heroBuilder = new HeroBuilder('Example');
        $newCharacter = (new Director())->build($heroBuilder);
        dump($newCharacter);

        return $this->render('hero/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/hero", name="app_hero_create", methods={"POST"})
     */
    public function create()
    {
        return $this->render('hero/index.html.twig', [
            'controller_name' => 'HeroController',
        ]);
    }

    /**
     * @Route("/hero/{id}", name="app_hero_delete", methods={"DELETE"})
     */
    public function delete(Hero $hero, EntityManagerInterface $entityManager): Response
    {

        $entityManager->remove($hero);
        $entityManager->flush();

        $response = new Response();
        $this->addFlash('success','Hero was deleted :(');
        $response->send();
        return $response;

    }

}
