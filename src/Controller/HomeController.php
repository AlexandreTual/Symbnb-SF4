<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/hello/{prenom}/{age}", name="hello")
     * @Route("/hello", name="hello_base")
     * @Route("/hello/{prenom}", name="hello_prenom")
     * 
     * retourne la page qui dit boujour
     *
     * @param string $prenom
     * @param string $age
     * @return void
     */
    public function hello($prenom = "anonyme", $age = 0)
    {
        return new response("Bonjour ".$prenom." tu as ".$age);
    }

    /** 
     * @Route("/", name="homepage")
    */
    public function home() 
    {
       return $this->render('home.html.twig');
    }
}