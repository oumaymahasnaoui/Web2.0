<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ServiceController extends AbstractController
{
    /**
     * @Route("/service/{name}", name="service_show")
     */
    public function showService($name): Response
    {
        return $this->render('service/showService.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/goToIndex", name="go_to_index")
     */
    public function goToIndex(): RedirectResponse
    {
        return $this->redirectToRoute('home');
    }
}