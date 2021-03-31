<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Espace_proController extends AbstractController
{
    /**
     * @Route("/pro", name="pro")
     */
    public function index(): Response
    {
        return $this->render('espace_pro/espace_pro.html.twig', [
            'controller_name' => 'Espace_proController',
        ]);
    }
}
