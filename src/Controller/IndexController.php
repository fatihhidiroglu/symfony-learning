<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

    /**
     * @Route("/request", name="request_test")
     * @param RequestStack $requestStack
     */
    public function requestTest(RequestStack $requestStack) {
        $request = $requestStack->getCurrentRequest();

        // $_POST
        $name = $request->request->get('name');

        // $_GET
        $name = $request->query->get('name', 'Fatih');

        // $_COOKIE
        $request->cookies->get('username');

        // karşılığı yok
        $request->attributes->get('name');

        // $_FILES
        $request->files->get('filename');

        // $_SERVER
        $serverData = $request->server->get( 'REMOTE_ADDR');

        $headers = $request->headers->all();

        var_dump($headers);exit;
    }

    /**
     * @Route("/response", name="response_test")
     * @param RequestStack $requestStack
     */
    public function responseTest(RequestStack $requestStack) {
        return $this->redirectToRoute('request_test');
    }

    /**
     * @Route("/service", name="servis_test")
     * @param SessionInterface $session
     * @return Response
     */

    public function serviceTest(SessionInterface $session) {
        return new Response($session->getName());
    }

}
