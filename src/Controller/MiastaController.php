<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Informations;
use App\Repository\InformationsRepository;
use App\Entity\User;
class MiastaController extends AbstractController
{
    /**
     * @Route("/miasta", name="miasta")
     */
    public function index()
    {
       $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy([], ['id' => 'DESC']);



return $this->render('miasta/index.html.twig', [
'controller_name' => 'MiastaController',
 'dane' => $entities
]);

    }

     /**
     * @Route("/artykul/{id}", name="show")
     */
    public function show($id,InformationsRepository $informationsRepository)
    {
       $em = $this->getDoctrine()->getManager();
    $articl = $em->getRepository(Informations::class)->find($id);
    $author = $em->getRepository(User::class)->findBy(
            array(),array('id' => 'DESC'));


    $query=$em->createQuery(
            'SELECT u.email FROM  App\Entity\Informations i join App\Entity\User u with i.author=u.id and i.id='.$id
            );



   $articl->incrementViewsCounter();


    $result=$query->getSingleResult();

    $em->persist($articl);
    $em->flush();


    if (!$articl) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
    return $this->render('miasta/show.html.twig', [
        'dane' => $articl,
       'autor'=>$result,
       's'=>$articl->getViewsCounter()]
            );
    }


    /**
     * @Route("/lublin", name="lublin")
     */
    public function lublin()
    {
          $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy(
    ['city' => 'Lublin'],array('id' => 'DESC')
);

return $this->render('miasta/index.html.twig', [
'controller_name' => 'MiastaController',
    'city_name'=>'Lublin',
    'dane' => $entities
]);
    }

    /**
     * @Route("/warszawa", name="warszawa")
     */
    public function warszawa()
    {
         $em = $this->getDoctrine()->getManager();
$entities = $em->getRepository(Informations::class)->findBy(
    ['city' => 'Warszawa']
);

return $this->render('miasta/index.html.twig', [
'controller_name' => 'MiastaController',
     'city_name'=>'Warszawa',
    'dane' => $entities
]);
    }






}

