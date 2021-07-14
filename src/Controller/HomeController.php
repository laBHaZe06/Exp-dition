<?php

namespace App\Controller;

use App\Entity\Equipage;
use App\Form\EquipeFormType;
use App\Repository\EquipageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(EquipageRepository $equipageRepository,Request $request,EntityManagerInterface $em): Response
    {
        $team = $equipageRepository->findAll();
       // dump($team);
        $dreamTeam = new Equipage();
        $form = $this->createForm(EquipeFormType::class, $dreamTeam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $dreamTeam->setNom($data);
            $em->persist($dreamTeam);
            $em->flush();

          $this->addFlash('success', 'votre équipier a bien été ajouter ! ');
          return $this->redirectToRoute('home');

        } 

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'team'=>$team,
            'form'=>$form->createView(),
           
        ]);
    }

    
    /** 
     * permet de supprimer une annonce 
     * @Route("/{id}/delete", name="delete",requirements={"id":"\d+"})  
     */ 
    public function delete(EntityManagerInterface $manager,Equipage $equipage)
    {        
        $manager->remove($equipage); 
        $manager->flush();
      
      // envoyer l'info à la bdd 
      $this->addFlash( 'success', 'L\'équipier '.$equipage->getNom().' a bien été supprimée !' );
      
      return $this->redirectToroute('home');
    
    }

}
