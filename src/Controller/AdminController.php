<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\User as UserUser;

class AdminController extends AbstractController
{
    /**
     * @IsGranted ("ROLE_ADMIN")
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
    

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('admin/admin.html.twig', [
           
            'users' => $users
        ]);
    }
    /**
     * @Route("/user/modifier/{id}", name="modifier_utilisateur")
     */
    public function editUser(User $user, Request $request)
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('admin_utilisateurs');
        }
        
        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView(),
        ]);
    }
}
