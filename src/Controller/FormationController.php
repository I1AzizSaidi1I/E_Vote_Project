<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(): Response
    {
        $table = [
            'formation' => 'bagouri',
            'thaloula' => 'ardeji',
            'mhanni' => 'ba9louti'
        ];

        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
            'table' => $table
        ]);
    }

    #[Route('/tab/{nb?5}', name: 'tab_note')]
    public function note($nb): Response
    {
       $tableNotes = [];

       for ($i = 0; $i <=$nb; $i++) {
           $tableNotes[]= rand(0,20);
       }

        return $this->render('formation/note.html.twig', [
            'tabNote'=> $tableNotes

        ]);
    }

    #[Route('/heritage', name: 'app_formation_heritage')]
    public function heritage(): Response
    {
        return $this->render('formation/heritage.html.twig');
    }

}
