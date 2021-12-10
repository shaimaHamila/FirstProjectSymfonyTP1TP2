<?php

namespace App\Controller;

use Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;


class TestController extends AbstractController
{

    /**
    * @Route("/luckycontraint/number/{max<\d+>}")
    */
    public function test2($max): Response
    {   
        $number = random_int(0, $max);

        return $this->render('test/index.html.twig', [
            'number' => $number,
        ]);
    }

    /**
    * @Route("/lucky/number/{max}")
    */
    public function test($max): Response
    {   
        if(!isset($max)||(!is_numeric($max) )){
            throw new HttpException(404, 'Ah shit here we go again');
        }
        $number = random_int(0, $max);

        return $this->render('test/index.html.twig', [
            'number' => $number,
        ]);
    }





}
