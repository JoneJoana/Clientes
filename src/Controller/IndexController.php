<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ClientRepository $repo)
    {
        $clientes = $repo->findAll();    
        return $this->render('clientes/base.html.twig', [
            'clientes' => $clientes
        ]);
    }
    
}