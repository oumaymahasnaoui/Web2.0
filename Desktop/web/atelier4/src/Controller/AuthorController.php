<?php

namespace App\Controller;

use App\Entity\Author;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/list/{var}', name: 'list_author')]
    public function listAuthor($var)
    {
        $authors = [
            ['id' => 1, 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100],
            ['id' => 2, 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200],
            ['id' => 3, 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300],
        ];

        return $this->render("author/list.html.twig", [
            'variable' => $var,
            'tabAuthors' => $authors,
        ]);
    }

    #[Route('/listAuthor', name: 'authors')]
    public function list(AuthorRepository $repository): Response
    {
        $authors = $repository->findAll();
        return $this->render("author/listAuthors.html.twig", [
            'tabAuthors' => $authors,
        ]);
    }

    #[Route('/add', name: 'add_authors')]
    public function addAuthor(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $author = new Author();
        $author->setEmail("author6@gmail.com");
        $author->setUsername("author6");
        $em = $managerRegistry->getManager();
        $em->persist($author);
        $em->flush();
        return $this->redirectToRoute("authors");
    }

    #[Route('/update/{id}', name: 'update_authors')]
    public function updateAuthor($id, AuthorRepository $repository, ManagerRegistry $managerRegistry): Response
    {
        $author = $repository->find($id);
        $author->setEmail("author7@gmail.com");
        $author->setUsername("author7");
        $em = $managerRegistry->getManager();
        $em->flush();
        return $this->redirectToRoute("authors");
    }

    #[Route('/remove/{id}', name: 'remove_authors')]
    public function deleteAuthor($id, AuthorRepository $repository, ManagerRegistry $managerRegistry): Response
    {
        $author = $repository->find($id);
        $em = $managerRegistry->getManager();
        $em->remove($author);
        $em->flush();
        return $this->redirectToRoute("authors");
    }
}
