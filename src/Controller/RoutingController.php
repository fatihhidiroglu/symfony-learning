<?php

namespace App\Controller;

use phpDocumentor\Reflection\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RoutingController extends AbstractController
{
    /**
     * @Route({
     *     "en": "/about",
     *     "tr": "/hakkinda"
     * }, name="about")
     * @return Response
     */
    public function hakkinda() {
        return new JsonResponse(['message' => 'Hakkında Sayfası']);
    }

    /**
     * @Route("/blog/{page}", name="blog_listele", requirements={"page"="\d+"})
     */
    public function listele($page) {
        return new Response("Sayfa : " . $page);
    }

    /**
     * @Route("/blog-listele/{page<\d+>}", name="blog_listele_3")
     */
    public function listeleBlog($page) {
        return new Response("Listeleme : " . $page);
    }

    /**
     * @Route("/blog/{postSlug}", name="blog_listele_2")
     */
    public function listeleWithSlug($postSlug) {
        return new Response("Post Slug : " . $postSlug);
    }

    /**
     * @Route("/routing/hello/{_locale}", defaults={"_locale"="tr"}, requirements={"_locale"="en|tr"})
     */
    public function helloRouting($_locale) {
       return new Response("Locale is : " . $_locale);
    }

    /**
     * @Route("/api/posts/{id}", methods={"GET", "HEAD"})
     */
    public function showPost($id) {
        return new JsonResponse(["message" => $id]);
    }

    /**
     * @Route("/posts/{page}", name="post_listele", requirements={"page"="\d+"})
     */
    public function postListeleme($page = 1) {
        return new JsonResponse(["message" => $page]);
    }

    /**
     * @Route("/posts-listele/{page<\d+>?2}", name="post_listele_yeni")
     */
    public function postListeleme2($page) {
        return new JsonResponse(["message" => $page]);
    }

    /**
     * @Route("/makalele/{_locale}/{yil}/{slug}.{_format}",
     *  defaults={"_format":"html"},
     *  requirements={
     *     "_locale":"en|tr",
     *     "_format":"html|json",
     *     "yil":"\d+"
     *  }
     * )
     * @return JsonResponse
     */
    public function showMakale($_locale, $yil, $slug, $_format) {
        return new JsonResponse(["message" => implode("---", [
            $_locale, $yil, $slug, $_format,
        ])]);
    }

    /**
     * @Route("/generate-url")
     */
    public function urlUret() {
        $url = $this->generateUrl("app_routing_showmakale", [
            '_locale' => 'en',
            '_format' => 'html',
            'yil' => 1998,
            'slug' => 'kaliteli-hizmet-nasil-verilir'
        ]);
        return new JsonResponse(['url' => $url]);
    }

    /**
     * @Route("/generate-url-servis")
     */
    public function urlUret2(UrlGeneratorInterface $router) {
        $url = $router->generate("app_routing_showmakale", [
            '_locale' => 'en',
            '_format' => 'html',
            'yil' => 1998,
            'slug' => 'kaliteli-hizmet-nasil-verilir-yeni-versiyon'
        ]);
        return new JsonResponse(['url' => $url]);
    }

    /**
     * @Route("/generate-url-ornek")
     */
    public function ornek() {
        $url = $this->generateUrl("post_listele_yeni", [
            "page" => 19,
            "kategori" => "saglik",
            "yas" => 25,
        ]);

        $fullUrl = $this->generateUrl("post_listele_yeni", [
            "page" => 19,
            "kategori" => "saglik",
            "yas" => 25,
        ],UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse(['url' => $url, 'fullUrl' => $fullUrl]);
    }
}
