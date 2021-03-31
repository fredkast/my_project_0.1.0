<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PourquoiController extends AbstractController
{
    /**
     * @Route("/pourquoi", name="pourquoi")
     */
    public function index(): Response
    {
        return $this->render('pourquoi/pourquoi.html.twig', [
            'controller_name' => 'PourquoiController',
        ]);
    }
}
