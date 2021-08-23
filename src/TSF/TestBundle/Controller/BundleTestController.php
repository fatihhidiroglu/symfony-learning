<?php

namespace App\TSF\TestBundle\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BundleTestController extends AbstractController {
    /**
     * @Route("/bundle-test/merhaba")
     * @param MessageGenerator $messageGenerator
     * @return Response
     */
    public function merhaba()
    {
        return $this->render('@TsfTest/Merhaba/index.html.twig');
    }
}