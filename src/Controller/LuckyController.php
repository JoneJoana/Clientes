<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function number(int $max)
    {
        $number = random_int(0,$max);
                
        return $this->render('lucky/number.html.twig',['number' => $number, 'max' => $max,]);       
        
    }
        
}