<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateFiltersController extends AbstractController
{
    /**
     * @Route("/template-filters", name="template_filters")
     * @return Response
     */

    public function index() {
        return $this->render('template_filters/index.html.twig', [
            'negativeVar' => -25,
            'sentence' => '   merhaba ben Fatih',
            'today' => new \DateTime(),
            'sehirler' => [
                'İç Anadolu' => 'Sivas',
                'Marmara' => 'İstanbul',
                'Akdeniz' => 'Antalya',
            ],
            'rawData' => '<h3>Selam Dostum</h3>'
        ]);
    }
}
