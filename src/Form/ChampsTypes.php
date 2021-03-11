<?php
namespace App\Form;

use App\Entity\Champs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;




class ChampsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class)
        ->add('lastname', TextType::class)
        ->add('organization', TextType::class)
        ->add('jobTitle', TextType::class)
        ->add('email', EmailType::class)
        ->add('phoneNumber', TelType::class)
        ->add('message', TextareaType::class, ['label' => 'Message', 'disabled'=>false])
        ->add('description', TextareaType::class, ['label' => 'Description du message','disabled'=>false])
        ->add('save', SubmitType::class, ['attr' => ['class' => 'save']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Champs::class,
        ]);
    }


}