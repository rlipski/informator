<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Informations;
use App\Form\InformationsType;
use App\Repository\InformationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Route("/artykulyedycja")
 */
class InformationsController extends AbstractController
{
    /**
     * @Route("/", name="informations_index", methods={"GET"})
     */
    public function index(InformationsRepository $informationsRepository): Response
    {
        
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
             return $this->render('informations/index.html.twig', [
                'informations' => $informationsRepository->findBy([], ['id' => 'DESC']),
            ]);
             
         }
        
        else if ($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
             $userId = $this->getUser()->getId();
            return $this->render('informations/index.html.twig', [
                'informations' => $informationsRepository->findBy(
    ['author' => $userId]
),
            ]);
         }
          
         else {
                return $this->render('informations/index.html.twig', [
                'informations' => $informationsRepository->findBy([], ['id' => 'DESC']),
            ]);
             
         }
    }

    /**
     * @Route("/nowy", name="informations_new", methods={"GET","POST"})
     */
    public function nowy(Request $request): Response
    {$userId = (int) $this->get('security.token_storage')->getToken()->getUser()->getId();

        //$userId = $this->getUser()->getId();
        $information = new Informations();
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);
              
        if ($form->isSubmitted() && $form->isValid()) {
             $information = $form->getData();
            
            $photoPath = $information->getPhotoPath();
            if ($photoPath) {
                $photoName = $userId . date("YmdHis") . mt_rand(1, 9999) . "." . $photoPath->guessExtension();
                $photoPath->move($this->getParameter('uploads_img'), $photoName);
                $information->setPhotoPath($photoName);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($information);
            $entityManager->flush();
                       
            return $this->redirectToRoute('informations_index');
        }
        return $this->render('informations/new.html.twig', [
            'information' => $information,
            'userId'=>$userId,
            'form' => $form->createView(),
        ]);
    }    

    /**
     * @Route("/{id}", name="informations_show", methods={"GET"})
     */
    public function show(Informations $information): Response
    {
        return $this->render('informations/show.html.twig', [
            'information' => $information,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="informations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Informations $information): Response
    {$userId = (int) $this->get('security.token_storage')->getToken()->getUser()->getId();
        $form = $this->createForm(InformationsType::class, $information);
        $form->handleRequest($request);
       
        $oldPhotoName = $information->getPhotoPath();
        
        if ($form->isSubmitted() && $form->isValid()) {
              $information = $form->getData();
            $photoPath = $information->getPhotoPath();
            if ($photoPath === null) {
                $information->setPhotoPath($oldPhotoName);
            } else {
                if ($oldPhotoName) {
                   // $photoToDelete = $this->getParameter("uploads_img") . "/" . $oldPhotoName;
                  //  unlink($photoToDelete);
                }
                $photoName = $userId . date("YmdHis") . mt_rand(1, 9999) . "." . $photoPath->guessExtension();
                $photoPath->move($this->getParameter('uploads_img'), $photoName);
                $information->setPhotoPath($photoName);
            }
            
            
            
            
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('informations_index', [
                'id' => $information->getId(),
            ]);
        }

        return $this->render('informations/edit.html.twig', [
            'information' => $information,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="informations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Informations $information): Response
    {
        if ($this->isCsrfTokenValid('delete'.$information->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($information);
            $entityManager->flush();
        }

        return $this->redirectToRoute('informations_index');
    }
    
}
