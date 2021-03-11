<?php
// src/Controller/ProfesseurController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProfesseurType;
use App\Entity\Professeur;

class ProfesseurController extends AbstractController
{
    /**
     * @Route("/Professeur/new", name="newprofesseur" )
     */
    public function new(Request $request)
    {
        $professeur = new Professeur();#Instanciation de la class Professeur. $professeur est un objet

        

        $form = $this->createForm(ProfesseurType::class, $professeur);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		dump($professeur);//alors afficher le contenu de l'objet $article sur la console
            // je récupère le manager des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table) 
            $em->persist($professeur);
            //exécution du code sql
            $em->flush();
       
        }

    return $this->render('Professeur/new.html.twig', ['ProfesseurForm'=>$form->createView()]);
    }
}