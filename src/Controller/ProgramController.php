<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Repository\ProgramRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/program", name="program_")
 */
class ProgramController extends AbstractController

{
    /**
     * @Route("/", name="index")
     */
    public function index(ProgramRepository $programRepository): Response
    {

        $programs = $programRepository->findAll();
        dump($programs);
        die();
        return $this->render(
            'program/index.html.twig',
            [
                'website' => 'Wild Series',
            ]

        );
    }
    /**
     * @Route("/{id}", methods={"GET"}, name="show")
     */
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        // $program = $programRepository->findOneBy(['id' => $id]);

        return $this->render(
            'program/show.html.twig',
            [
                'id' => "4",
            ]
        );
    }
}
