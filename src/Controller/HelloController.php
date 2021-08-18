<?php

namespace App\Controller;

use App\Service\NameGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController {
    /**
     * @Route("/hello")
     * @param NameGenerator $nameGenerator
     * @return Response
     */
    public function hello(NameGenerator $nameGenerator)
    {
        $name = $nameGenerator->randomName();

        $message = 'Hello' . $name;

        return new Response($message);
    }
}