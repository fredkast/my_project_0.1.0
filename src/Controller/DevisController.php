<?php

namespace App\Controller;

use App\Entity\Devis;
use App\Entity\User;
use App\Form\DevisType;
use App\Repository\DevisRepository;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/devis")
 * @IsGranted("ROLE_USER")
 */
class DevisController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/mes_devis", name="devis_mes_devis", methods={"GET"})
     */
    public function mes_devis(DevisRepository $devisRepository): Response
    {
        return $this->render('devis/index.html.twig', [
            // renvois les devis ou user est l'utilisateur loggé
            'devis' => $devisRepository->findBy(array('user'=>$this->getUser()))
            
        ]);
    }
    
    /**
     * @IsGranted("ROLE_CLIENT")
     * @Route("/", name="devis_index", methods={"GET"})
     */
    public function index(DevisRepository $devisRepository): Response
    {
        return $this->render('devis/index.html.twig', [
            'devis' => $devisRepository->findAll(),
            
        ]);
    }

    /**
     * @Route("/new", name="devis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $devi = new Devis();
        $form = $this->createForm(DevisType::class, $devi);
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            // Affiche par default l'utilisateur connecté comme auteur du devis
            $devi->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($devi);
            $entityManager->flush();
            //Creer une alert votre devis est pris en compte!

            $this->addFlash('success','Votre devis a bien été enregistré!');
            
            return $this->render('devis/show.html.twig', [
                'devi' => $devi,
            ]);
            
        }

        return $this->render('devis/new.html.twig', [
            'devi' => $devi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="devis_show", methods={"GET"})
     */
    public function show(Devis $devi): Response
    {
        return $this->render('devis/show.html.twig', [
            'devi' => $devi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="devis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Devis $devi): Response
    {
        $form = $this->createForm(DevisType::class, $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('devis_index');
        }

        return $this->render('devis/edit.html.twig', [
            'devi' => $devi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="devis_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Devis $devi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($devi);
            $entityManager->flush();
        }
        $this->addFlash('success','Votre devis a bien été supprimé!');
        return $this->redirectToRoute('devis_index');
    }
}
