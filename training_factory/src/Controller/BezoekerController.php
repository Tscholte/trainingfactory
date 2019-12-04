<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BezoekerController extends AbstractController{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return $this->render('bezoeker/registreren.html.twig');
    }


}

