<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MainController extends AbstractController
{
    private string $style_path; 
    
    /**
     * @Route("/", name = "main")
     */
    public function index(): Response
    {
        $style_path = (isset($_COOKIE['theme'])) ? $_COOKIE['theme'] : 'styles/superhero_bootstrap.min.css';
        return $this->render('main/index.html.twig', [
            'style_path' => $style_path,
        ]);
    }

    /**
     * @Route("themes/{theme}/{route?}", name = "theme")
     */
    public function setTheme(string $theme, string $route = 'main') : RedirectResponse {
        $path;
        if ($theme == 'dark') $path = 'styles/superhero_bootstrap.min.css';
        else if ($theme == 'wlight') $path = 'styles/united_bootstrap.min.css';
        else $path = 'styles/minty_bootstrap.min.css';
        $response = $this->redirectToRoute($route);
        $response->headers->setCookie(Cookie::create('theme', $path));
        return $response;
    }
}
