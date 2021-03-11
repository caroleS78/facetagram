<?php
// src/Controller/LyceeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LyceeType;
use App\Entity\Lycee;

class LyceeController extends AbstractController
{
    /**
     * @Route("/Lycee/new", name="newlycee" )
     */
    public function new(Request $request)
    {
        $lycee = new Lycee();#Instanciation de la class Lycee. $Lycee est un objet

        

        $form = $this->createForm(LyceeType::class, $lycee);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		dump($lycee);//alors afficher le contenu de l'objet $matiere sur la console
            // je récupère le manager des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table) 
            $em->persist($lycee);
            //exécution du code sql
            $em->flush();
        }

    return $this->render('Lycee/new.html.twig', ['LyceeForm'=>$form->createView()]);
    }
}