<?php

namespace App\Controller;

use App\Entity\Description;
use App\Form\DescriptionType;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DescriptionController extends AbstractController
{
    /**
     * @Route("/add_description", name="add_description")
     */
    public function addDescription(Request $request, EntityManagerInterface $entityManager): Response
    {
        $description = new Description();
        $form = $this->createForm(DescriptionType::class, $description);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ajoute l'utilisateur actuel (connecté) comme propriétaire de la description
            $description->setUser($this->getUser());

            // Enregistre la description dans la base de données
            $entityManager->persist($description);
            $entityManager->flush();

            return $this->redirectToRoute('get_description', ['fruit' => $description->getTitle()]);
        }

        return $this->render('description/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
