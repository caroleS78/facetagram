<?php
// src/Controller/EleveController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EleveType;
use App\Entity\Eleve;

class EleveController extends AbstractController
{
    /**
     * @Route("/Eleve/new", name="neweleve" )
     */
    public function new(Request $request)
    {
        $eleve = new Eleve();#Instanciation de la class Eleve. $eleve est un objet

        

        $form = $this->createForm(EleveType::class, $eleve);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($eleve);//alors afficher le contenu de l'objet $eleve sur la console
                            // je récupère le manager des données de ma table
            $em = $this->getDoctrine()->getManager();
            // Je prepare la sauvegarde / l'insertion de mon objet $contact dans ma base (1 ligne de table) 
            $em->persist($eleve);
            //exécution du code sql
            $em->flush();
       
        }

    return $this->render('Eleve/new.html.twig', ['EleveForm'=>$form->createView()]);
    }
}