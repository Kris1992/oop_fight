<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\{Response, Request};
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\MonsterRepository;
use App\Services\Builder\{MonsterBuilder, Director};
use App\Entity\Monster;

class MonsterController extends AbstractController
{

    /**
     * @Route("/monster", name="app_monster", methods={"GET"})
     */
    public function index(MonsterRepository $monsterRepository, Request $request, PaginatorInterface $paginator)
    {
        $monsterQuery = $monsterRepository->findAllQuery();

        $pagination = $paginator->paginate(
            $monsterQuery, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            $request->query->getInt('perPage', 10)/*limit per page*/
        );

        return $this->render('monster/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/monster", name="app_monster_create", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('token');
        $name = $request->request->get('name');

        if ($this->isCsrfTokenValid('generate', $submittedToken) && trim($name) !== '') {
            $monsterBuilder = new MonsterBuilder($name);
            $newCharacter = (new Director())->build($monsterBuilder);
            $entityManager->persist($newCharacter);
            $entityManager->flush();

            $this->addFlash('success','Monster was generated ;)');
        } else {
            $this->addFlash('warning','Wrong name or token');
        }
        
        return $this->redirectToRoute('app_monster');

    }
    
    /**
     * @Route("/monster/{id}", name="app_monster_delete", methods={"DELETE"})
     */
    public function delete(Monster $monster, EntityManagerInterface $entityManager): Response
    {

        $entityManager->remove($monster);
        $entityManager->flush();

        $response = new Response();
        $this->addFlash('success','Monster was deleted :(');
        $response->send();
        return $response;

    }

    /*
                                        I will do it by ajax to have RESTAPI links
     */
    /**
     * @Route("/monster/delete", name="app_monster_delete_multiple", methods={"POST", "DELETE"})
     */
    public function deleteMultiple(Request $request, MonsterRepository $monsterRepository, EntityManagerInterface $entityManager): Response
    {
        
        $submittedToken = $request->request->get('token');
        if($request->request->has('deleteId')) {
            if ($this->isCsrfTokenValid('delete_multiple', $submittedToken)) {
                $ids = $request->request->get('deleteId');
                $monsters = $monsterRepository->findAllByIds($ids);
                if($monsters) {
                    foreach ($monsters as $monster) {
                        $entityManager->remove($monster);
                    }
                    $entityManager->flush();

                    $this->addFlash('success','Monsters were deleted :(');
                } else {
                    $this->addFlash('warning','Nothing to do.');
                }

            } else {
                $this->addFlash('danger','Missed token.');
            }           

        } else {
            $this->addFlash('warning','Nothing to do.');
        }
        
        return $this->redirectToRoute('app_monster');

    }

}
