<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ChampsType;
use App\Entity\Champs;

class FormController extends AbstractController
{
    /**
     * @Route("/contactlist", name="contactlist" )
     */
    public function show(Request $request)
    {
        // get Repository va aller au niveau des données dans la table précisée
        // SELECT query
        $repository = $this->getDoctrine()->getRepository(Champs::class);
        // a ce stade il a accès au données
        // je veux stocker dans la variable $contacts TOUT mes contacts
        $contacts = $repository->findAll();

    return $this->render('contactlist.html.twig', ['contacts'=>$contacts]);
    }

    /**
     * @Route("/contact", name="contact" )
     */
    public function new(Request $request)
    {
        $champs = new Champs();#Instanciation de la class Champs. $champs est un objet

        

        $form = $this->createForm(ChampsType::class, $champs);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($champs);//alors afficher le contenu de l'objet $article sur la console
             $em = $this->getDoctrine()->getManager();
             $em->persist($champs);
             $em->flush();
       
        }

    return $this->render('champs.html.twig', ['Formulaire'=>$form->createView()]);
    }


    /**
    * @Route("/contact/edit/{id<\d+>}")
    */
    public function edit(Request $request, Champs $champs)
    {
    $form = $this->createForm(ChampsType::class, $champs);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // va effectuer la requête d'UPDATE en base de données
        $this->getDoctrine()->getManager()->flush();
    }

     return $this->render('champs.html.twig', ['Formulaire'=>$form->createView()]);
    }
    /**
    * @Route("/contact/delete/{id<\d+>}")
    */
        public function delete(Request $request, Champs $champs)
{
        $em = $this->getDoctrine()->getManager();
        $em->remove($champs);
        $em->flush();

        // redirige la page
        return $this->redirectToRoute('home');
}

}