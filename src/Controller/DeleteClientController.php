<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteClientController extends AbstractController
{
    /**
     * @Route("/borrar/{id}", name="borrar")
     */
    public function delete(int $id, ClientRepository $repo)
    {
        $client = $repo->find($id);
        try
        {
            $repo->remove($client); 
            $this->addFlash('success', 'Cliente ' .$id.' eliminado con éxito'); 
        }catch(\Exception $e){
            $this->addFlash('error', 'Fallo al Eliminar ID '.$id); 
            return 'An Error occured during save: ' .$e->getMessage();
        }
            
        return $this->redirectToRoute('index');
    }
}