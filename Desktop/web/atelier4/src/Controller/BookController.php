<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('Book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    #[Route('/addbook', name: 'addd_book')]
    public function addBook(Request $request,ManagerRegistry $managerRegistry)
    {
        $book= new Book();
        $form= $this->createForm(BookType::class,$book);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $book->setPublished(true);
            $em= $managerRegistry->getManager();
            $em->persist($book);
            $em->flush();
            return new Response("Done!");
        }
        //1ere methode
         return $this->render('Book/add.html.twig',array("formulaireBook"=>$form->createView()));
        //2eme methode
        //return $this->renderForm('Book/add.html.twig',array("formulaireBook"=>$form));
    }

    #[Route('/listBook', name: 'list_book')]
    public function listBook(BookRepository  $repository)
    {
       /* return $this->render("Book/listBooks.html.twig",
            array('book'=>$repository->findAll()));*/
         return $this->render("Book/listBooks.html.twig",
              array('book'=>$repository->findBy(['published'=>false])));
    }
}
