<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
    

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/admin.html.twig', [
           
            'users' => $users
        ]);
    
      

    }
    
}
