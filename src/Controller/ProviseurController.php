<?php
// src/Controller/ProviseurController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProviseurType;
use App\Entity\Proviseur;

class ProviseurController extends AbstractController
{
    /**
     * @Route("/Proviseur/new", name="newproviseur" )
     */
    public function new(Request $request)
    {
        $proviseur = new Proviseur();#Instanciation de la class Proviseur. $proviseur est un objet

        

        $form = $this->createForm(ProviseurType::class, $proviseur);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		dump($proviseur);//alors afficher le contenu de l'objet $proviseur sur la console
            // je récupère le manager des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table) 
            $em->persist($proviseur);
            //exécution du code sql
            $em->flush();
       
        }

    return $this->render('proviseur/new.html.twig', ['ProviseurForm'=>$form->createView()]);
    }
}