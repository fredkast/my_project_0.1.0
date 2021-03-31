<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Comment_ca_marcheController extends AbstractController
{
    /**
     * @Route("/comment_ca_marche", name="comment_ca_marche")
     */
    public function index(): Response
    {
        return $this->render('comment_ca_marche/comment_ca_marche.html.twig', [
            'controller_name' => 'Comment_ca_marcheController',
        ]);
    }
}
