<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Informations;
class KategorieController extends AbstractController
{
    /**
     * @Route("/kategorie", name="kategorie")
     */
    public function index()
   {
       $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findAll();

return $this->render('kategorie/index.html.twig', [
'controller_name' => 'KategorieController', 'dane' => $entities
]);
        
    }
    
    /**
     * @Route("/informacje", name="informacje")
     */
    public function informacje()
     {
          $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy(
    ['category' => 'Informacje'],['id' => 'DESC']
);

return $this->render('kategorie/index.html.twig', [
'controller_name' => 'KategorieController',
    'category_name'=>'informacje',
    'dane' => $entities
]);
    }
    
    /**
     * @Route("/rozrywka", name="rozrywka")
     */
    public function rozrywka()
     {
          $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy(
    ['category' => 'Rozrywka'],['id' => 'DESC']
);

return $this->render('kategorie/index.html.twig', [
'controller_name' => 'KategorieController',
     'category_name'=>'rozrywka',
    'dane' => $entities
]);
    }
    
    /**
     * @Route("/sport", name="sport")
     */
    public function sport()
  {
          $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy(
    ['category' => 'Sport'],['id' => 'DESC']
);

return $this->render('kategorie/index.html.twig', [
'controller_name' => 'KategorieController', 
    'category_name'=>'sport',
    'dane' => $entities
]);
    }
}
