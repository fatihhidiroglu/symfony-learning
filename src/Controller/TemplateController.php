<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController {
    /**
     * @Route("/template", name="template_index")
     * @return Response
     */

    public function index() {
        return $this->render('template/index.html.twig');
    }
}