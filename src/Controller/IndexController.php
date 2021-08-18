<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index() {
        // return new Response('Hellow World');

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController'
        ]);

        //return new JsonResponse(['message' => 'Merhaba Dünya']);

    }
}
