<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/api/login', name: 'api_login')]
    public function login(): Response
    {
        // Votre logique pour la route /api/login ici
        return $this->render('security/index.html.twig');
    }
}
