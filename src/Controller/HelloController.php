<?php

namespace App\Controller;

use App\Entity\Urun;
use App\Service\MessageGenerator;
use App\Service\NameGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController {
    /**
     * @Route("/hello")
     * @param MessageGenerator $messageGenerator
     * @return Response
     */
    public function hello(MessageGenerator $messageGenerator)
    {
        $session = $this->container->get('session');
        return new Response($messageGenerator->helloMessage() . ' ------ ' . $session->getName());
    }
}