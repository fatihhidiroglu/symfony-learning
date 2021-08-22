<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssetController extends AbstractController
{
    /**
     * @Route("/asset-kontrol", name="asset_kontrol")
     */
    public function index(): Response
    {
        return $this->render('asset/index.html.twig');
    }
}
