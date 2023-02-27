<?php

namespace App\Controller;

use App\Entity\Category;

use App\Entity\Program;

use App\Form\CategoryType;

use App\Repository\CategoryRepository;

use App\Repository\ProgramRepository;
use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/category", name="category_")
 */
class CategoryController extends AbstractController

{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render(
            'category/index.html.twig',
            ['categories' => $categories]

        );
    }
    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, CategoryRepository $categoryRepository): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $categoryRepository->save($category, true);
        }

        return $this->render(
            'category/new.html.twig',
            [
                'form' => $form,
            ]
        );
    }

    /**
     * @Route("/{categoryName}", methods={"GET"}, name="show")
     */
    public function show(string $categoryName, CategoryRepository $categoryRepository, ProgramRepository $programsRepository): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException(
                'No category with categoryName : ' . $categoryName . 'found in category\'s table'
            );
        }

        $programs = $programsRepository->findBy(['category' => $category], ['id' => 'DESC']);



        return $this->render(
            'category/show.html.twig',
            [
                'category' => $category,
                'programs' => $programs,
            ]
        );
    }
}
