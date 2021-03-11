<?php
// src/Controller/MatiereController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\MatiereType;
use App\Entity\Matiere;

class MatiereController extends AbstractController
{
    /**
     * @Route("/Matiere/new", name="newmatiere" )
     */
    public function new(Request $request)
    {
        $matiere = new Matiere();#Instanciation de la class Matiere. $matiere est un objet

        

        $form = $this->createForm(MatiereType::class, $matiere);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($matiere);//alors afficher le contenu de l'objet $matiere sur la console
            // je récupère le manager des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table) 
            $em->persist($matiere);
            //exécution du code sql
            $em->flush();
        }

    return $this->render('Matiere/new.html.twig', ['MatiereForm'=>$form->createView()]);
    }
}