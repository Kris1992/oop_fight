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
use App\Services\Builder\HeroBuilder;
use App\Services\Builder\Director;
use App\Entity\Hero;

class HeroController extends AbstractController
{
    
    /**
     * @Route("/hero", name="app_hero", methods={"GET"})
     */
    public function index(HeroRepository $heroRepository, Request $request, PaginatorInterface $paginator, EntityManagerInterface $entityManager)
    {
        $heroQuery = $heroRepository->findAllQuery();

        $pagination = $paginator->paginate(
            $heroQuery, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('perPage', 10)/*limit per page*/
        );

        return $this->render('hero/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/hero", name="app_hero_create", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('token');
        $name = $request->request->get('name');

        if ($this->isCsrfTokenValid('generate', $submittedToken) && trim($name) !== '') {
            $heroBuilder = new HeroBuilder($name);
            $newCharacter = (new Director())->build($heroBuilder);
            $entityManager->persist($newCharacter);
            $entityManager->flush();

            $this->addFlash('success','Hero was generated ;)');
        } else {
            $this->addFlash('warning','Wrong name or token');
        }

        
        return $this->redirectToRoute('app_hero');

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

    /*
                                        I will do it by ajax to have RESTAPI links
     */
    /**
     * @Route("/hero/delete", name="app_hero_delete_multiple", methods={"POST", "DELETE"})
     */
    public function deleteMultiple(Request $request, HeroRepository $heroRepository, EntityManagerInterface $entityManager): Response
    {
        
        $submittedToken = $request->request->get('token');
        if($request->request->has('deleteId')) {
            if ($this->isCsrfTokenValid('delete_multiple', $submittedToken)) {
                $ids = $request->request->get('deleteId');
                $heros = $heroRepository->findAllByIds($ids);
                if($heros) {
                    foreach ($heros as $hero) {
                        $entityManager->remove($hero);
                    }
                    $entityManager->flush();

                    $this->addFlash('success','Heros were deleted :(');
                } else {
                    $this->addFlash('warning','Nothing to do.');
                }

            } else {
                $this->addFlash('danger','Missed token.');
            }           

        } else {
            $this->addFlash('warning','Nothing to do.');
        }
        
        return $this->redirectToRoute('app_hero');

    }

}
