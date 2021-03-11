<?php
namespace App\Form;

use App\Entity\Client;
use App\Entity\Panier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;





class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class)
        ->add('price', IntegerType::class) 
        ->add('category', TextType::class)
        ->add('client', EntityType::class, ['class' => Client::class,'choice_label' => 'client'])
        ->add('paniers', EntityType::class, ['class' => Panier::class,'choice_label' => 'panier']) 
              
        ->add('save', SubmitType::class, ['attr' => ['class' => 'save']
        ]);

    }
}