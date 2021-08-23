<?php

namespace App\TSF\TestBundle\Controller;

use App\Service\MessageGenerator;
use phpDocumentor\Reflection\Utils;
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
        return new Response('Merhaba ben test bundle');
    }
}