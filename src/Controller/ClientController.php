<?php
// src/Controller/ClientController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ClientType;
use App\Entity\Client;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/new", name="newclient" )
     */
    public function new(Request $request)
    {
        $client = new Client();#Instanciation de la class client. $client est un objet

        

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($client);//alors afficher le contenu de l'objet $article sur la console
       
        }

    return $this->render('client.html.twig', ['ClientForm'=>$form->createView()]);
    }
}