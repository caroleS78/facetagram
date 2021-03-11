<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FacetagramController extends AbstractController
{
/**
* @Route("/",name="home" )
*/
public function home()
    {        
        return $this->render('home.html.twig');#je veux la route /home
    }



/**
* @Route("/about", name="a_propos")
*/
public function about()
    {        
        return $this->render('about.html.twig');#je veux la route /about
    } 
    
/**
* @Route("/product", name="produit")
*/
public function product()
    {        
        return $this->render('product.html.twig');#je veux la route /products
    } 
    
/**
* @Route("/service", name="service")
*/
public function service()
    {        
        return $this->render('service.html.twig');#je veux la route /services
    } 

    


}