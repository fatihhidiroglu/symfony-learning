<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateTagsController extends AbstractController {
    /**
     * @Route("/template-tags", name="index")
     * @return Response
     */

    public function index() {
        return $this->render('template-tags/index.html.twig', [
            'sehirler' => [
                'Ankara',
                'Sivas',
                'Kayseri',
                'İzmir'
            ],
            'ifVar' => false,
            'definedCheck' => 'TSF',
            'emptyCheck' => false,
            'nullCheck' => NULL,
            'iterableCheck' => ['Hakem', 'Fatih'],
        ]);
    }
}