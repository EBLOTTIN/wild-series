<?php

// src/Controller/ProgramController.php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Saison;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;


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
    public function show(Program $program): Response
    {

        return $this->render(
            'program/show.html.twig',
            [
                'program' => $program,
            ]
        );
    }

    /**
     * @Route("/{program_id}/season/{season_id}", methods={"GET"}, name="season_show")
     * @Entity("program", options={"mapping": {"program_id": "id"}})
     * @Entity("season", options={"mapping": {"season_id": "id"}})
     */

    public function showSeason(Program $program, Saison $season)
    {

        return $this->render(
            'program/season_show.html.twig',
            [
                'program' => $program,
                'season' => $season,
            ]
        );
    }
}
