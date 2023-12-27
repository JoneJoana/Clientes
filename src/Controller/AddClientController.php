<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\Type\DataManagementForm;
use App\Repository\ClientRepository;
use Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AddClientController extends AbstractController
{
    /**
     * @Route("/nuevo", name="nuevo")
     */
    public function create(Request $request, ClientRepository $repo)
    {        
        $titleForm = "Añadir Cliente";
        $client = new Client();
        $client  ->setAdded(new \DateTime('yesterday'))
                    ->setUpdated(new \DateTime('yesterday'));

        $form = $this->createForm(DataManagementForm::class, $client);

        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ) {
            $client = $form->getData(); 
            try {
                $repo->add($client);  
                $this->addFlash('success', 'Cliente '.$client->getId().' guardado con éxito'); 
                return $this->redirectToRoute('index');
            } catch (Exception $e) {
                $this->addFlash('error', 'Fallo al Añadir. Inténtalo de nuevo'); 
                return 'An Error occured during save: ' .$e->getMessage();
            }            
        }
        
        return $this->render('clientes/add/new.html.twig', [
            'form'=> $form->createView(), 'titleForm' => $titleForm
        ]);
    }
}