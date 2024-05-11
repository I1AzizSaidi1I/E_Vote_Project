<?php

namespace App\Controller;

use App\Entity\Person;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends AbstractController
{
    #[Route('/person', name: 'app_person')]
    public function index(ManagerRegistry $doctrine ): Response
    {

        $repository = $doctrine->getRepository(Person::class);
        $persons = $repository->findAll();;
        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
            'persons' => $persons
        ]);
    }
    #[Route('/Person/add', name: 'Person.add')]
    public function addPerson(ManagerRegistry $doctrine): Response
    {
       $entityManger = $doctrine->getManager();
       $person = new Person();
       $person->setFirstName('Mohamed');
       $person->setLastName('Ben Mohamed');
       $person->setAge(20);
       $entityManger->persist($person);
       $entityManger->flush();

       return $this->render('person/detail.html.twig', [
           'person' => $person,
       ]);
    }
}
