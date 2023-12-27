<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class FormularioBasicoController extends AbstractController
{
    /**
     * @Route("/formBasic")
     */
    public function new(Request $request): Response
    {
        $user = new User();
                     
        
        $form = $this->createFormBuilder($user)
        ->add('name', TextType::class)
        ->add('surname', TextType::class)
        ->add('age', NumberType::class)
        ->add('save', SubmitType::class, ['label' => 'Submit'])
        ->getForm();

        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ) {
            $user = $form->getData();            
        }

        return $this->render('formBasic/form_basic.html.twig', [
            'form'=> $form->createView(), 'user' => $user,
        ]);
    }

    
}