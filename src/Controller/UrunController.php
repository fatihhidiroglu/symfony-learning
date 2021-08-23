<?php

namespace App\Controller;

use App\Entity\Urun;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UrunController extends AbstractController
{
    /**
     * @Route("/urunler", name="urun_index")
     * @return Response
     */
    public function index() {
        $urunRepository = $this->getDoctrine()->getRepository(Urun::class);

        $urunler = $urunRepository->findAll();

        return $this->render('urun/index.html.twig', [
            'urunler' => $urunler,
        ]);
    }

    /**
     * @Route("/urunler/create", name="urun_create")
     * @return Response
     */
    public function create() {
        $entityManager = $this->getDoctrine()->getManager();

        $urun = new Urun();
        $urun->setIsim('Volvo S90')
            ->setAciklama('Tekerlekli Tank')
            ->setFiyat(200000);

        $entityManager->persist($urun);

        $entityManager->flush();

        return new Response(sprintf('Urun basari ile olusturuldu Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/{id}", name="urun_show")
     * @return Response
     */
    public function show($id) {

        $urunRepository = $this->getDoctrine()->getRepository(Urun::class);

        $urun = $urunRepository->find($id);

        return new Response(sprintf('Urun basari ile alindi Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/update/{id}", name="urun_update")
     * @return Response
     */
    public function update($id, Request $request) {

        $isim = $request->get('isim');
        $entityManager = $this->getDoctrine()->getManager();
        $urunRepository = $entityManager->getRepository(Urun::class);

        $urun = $urunRepository->find($id);

        $urun->setIsim($isim)
            ->setFiyat(rand(10, 100));

        $entityManager->persist($urun);

        $entityManager->flush();

        return new Response(sprintf('Urun basari ile guncellendi Id: %s', $urun->getId()));
    }

    /**
     * @Route("/urunler/delete/{id}", name="urun_delete")
     * @return Response
     */
    public function delete(Urun $id) {
        $entityManager = $this->getDoctrine()->getManager();

        $urun = $entityManager->getRepository(Urun::class)->find($id);

        if (!$urun) {
            return $this->createNotFoundException('Urun bulunamad?!');
        }

        $entityManager->remove($urun);
        $entityManager->flush();

        return new Response('Urun basari ile silindi');
    }
}
