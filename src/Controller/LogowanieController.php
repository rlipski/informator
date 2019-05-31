<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LogowanieController extends AbstractController
{
    /**
     * @Route("/2", name="logowanie")
     */
    public function index()
    {
         if ($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return new RedirectResponse('stronaglowna');
        }
        
        return $this->render('logowanie/index.html.twig', [
            'controller_name' => 'LogowanieController',
        ]);
    }
    
    
    
}
