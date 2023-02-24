<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Entity\Program;

use App\Repository\ProgramRepository;

use App\Repository\SeasonRepository;

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
        return $this->render(
            'program/index.html.twig',
            ['programs' => $programs]

        );
    }
    /**
     * @Route("/{id}", methods={"GET"}, name="show")
     */
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : ' . $id . 'found in program\'s table'
            );
        }

        return $this->render(
            'program/show.html.twig',
            [
                'program' => $program,
            ]
        );
    }

    /**
     * @Route("/{porgramId}/seasons/{seasonId}", methods={"GET}, name="program_season_show")
     */

    public function showSeason(int $programId, int $seasonId, ProgramRepository $programRepository, SeasonRepository $seasonRepository)
    {
        $programId = $programRepository->findOneBy(['id' => $programId]);
        $seasonId = $seasonRepository->findOneBy(['id' => $seasonId]);

        return $this->render(
            'program/season_show.html.twig',
            [
                'pogramId' => $programId,
                'seasonId' => $seasonId,
            ]
        );
    }
}
