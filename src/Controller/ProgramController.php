<?php

// src/Controller/ProgramController.php

namespace App\Controller;


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
    public function list(int $page = 1): Response
    {
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
    public function show($id): Response
    {
        return $this->render(
            'program/show.html.twig',
            [
                'id' => "4",
            ]
        );
    }
}
