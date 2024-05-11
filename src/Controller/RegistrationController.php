<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;



    #[Route('/registration', name: 'app_registration', methods: ['POST'])]
    public function submitForm(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fullName = $request->request->get('full_name');
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $retypePassword = $request->request->get('retype_password');
        $agreeTerms = $request->request->get('terms');

        $user = new User();
        $user->setFullName($fullName);
        $user->setEmail($email);


        // Save the user to the database
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('3icha 9a7ba');
    }
}
