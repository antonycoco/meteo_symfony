<?php

namespace App\Controller;

use App\Entity\Billtain;
use App\Form\BilltainType;
use App\Repository\BilltainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/billtain")
 */
class BilltainController extends AbstractController
{
    /**
     * @Route("/", name="billtain_index", methods="GET")
     */
    public function index(BilltainRepository $billtainRepository): Response
    {
        return $this->render('billtain/index.html.twig', ['billtains' => $billtainRepository->findAll()]);
    }

    /**
     * @Route("/new", name="billtain_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $billtain = new Billtain();
        $form = $this->createForm(BilltainType::class, $billtain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($billtain);
            $em->flush();

            return $this->redirectToRoute('billtain_index');
        }

        return $this->render('billtain/new.html.twig', [
            'billtain' => $billtain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="billtain_show", methods="GET")
     */
    public function show(Billtain $billtain): Response
    {
        return $this->render('billtain/show.html.twig', ['billtain' => $billtain]);
    }

    /**
     * @Route("/{id}/edit", name="billtain_edit", methods="GET|POST")
     */
    public function edit(Request $request, Billtain $billtain): Response
    {
        $form = $this->createForm(BilltainType::class, $billtain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('billtain_edit', ['id' => $billtain->getId()]);
        }

        return $this->render('billtain/edit.html.twig', [
            'billtain' => $billtain,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="billtain_delete", methods="DELETE")
     */
    public function delete(Request $request, Billtain $billtain): Response
    {
        if ($this->isCsrfTokenValid('delete'.$billtain->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($billtain);
            $em->flush();
        }

        return $this->redirectToRoute('billtain_index');
    }
}
