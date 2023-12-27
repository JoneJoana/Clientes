<?php

namespace App\Controller;

use App\Form\Type\DataManagementForm;
use App\Repository\ClientRepository;
use Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EditClientController extends AbstractController
{
    /**
     * @Route("/editar/{id}", name="editar")
     */
    public function update(int $id, Request $request, ClientRepository $repo)
    {        
        $titleForm = "Editar cliente ".$id;
        $client = $repo->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No se ha encontrado al cliente con el id '.$id
            );
        }                

        $form = $this->createForm(DataManagementForm::class, $client);

        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ) {
            $client = $form->getData();
            $client->setUpdated(new \DateTime('now'));  
            try {
                $client = $repo->find($id);                      
                $repo->add($client);
                $this->addFlash('success', 'Cliente '.$id.' editado con éxito'); 
                return $this->redirectToRoute('index');
            } catch (Exception $e) {
                $this->addFlash('error', 'Fallo al Editar ID '.$id); 
                return 'An Error occured during save: ' .$e->getMessage();
            }
        }

        return $this->render('clientes/add/new.html.twig', [
            'form'=> $form->createView(), 'id' => $id, 'titleForm' => $titleForm
        ]);
    }
}