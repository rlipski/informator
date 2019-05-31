<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Informations;
use App\Entity\User;
class HomeController extends AbstractController
{
    /**
     * @Route("/stronaglowna", name="stronaglowna")
     */
    public function index()
     {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository(Informations::class)->findBy(
          [], ['id' => 'DESC']
        );
        $mostPopular= $em->getRepository(Informations::class)->findBy([], ['viewsCounter' => 'DESC']);

       return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'dane' => $entities,
            'mostPopular'=>$mostPopular,
            
        ]);
    }

}
