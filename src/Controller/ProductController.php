<?php
// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/new", name="newproduct" )
     */
    public function new(Request $request)
    {
        $product = new Product();#Instanciation de la class Product. $product est un objet

        

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);//Verification des contraintes imposées (ex: min caractères pr le champs description, NotBlank {ne pas retourner vide}..)

   		 if ($form->isSubmitted() && $form->isValid()) {// si "submit" et tout est valide
       		 dump($product);//alors afficher le contenu de l'objet $article sur la console
       
        }

    return $this->render('Product/new.html.twig', ['ProductForm'=>$form->createView()]);
    }
}