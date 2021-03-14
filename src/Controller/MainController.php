<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private String $style_path;
    
    /**
     * @Route("/", name = "main")
     */
    public function index(): Response
    {
        $style_path = 'styles/superhero_bootstrap.min.css';
        return $this->render('main/index.html.twig', [
            'style_path' => $style_path,
        ]);
    }
}
