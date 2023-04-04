<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class GenreController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $genres = $doctrine->getRepository(Genre::class)->findAll();


        return $this->render('home.html.twig', [
            'genres' => $genres,
        ]);
    }

    #[Route('/genre/{id}', name: 'genre')]
    public function genre(ManagerRegistry $doctrine,int $id): Response
    {
        $movies = $doctrine->getRepository(Movie::class)->find($id);
     dd($movies);

        return $this->render('genre.html.twig', [
            'movies' => $movies,
        ]);
    }


}


