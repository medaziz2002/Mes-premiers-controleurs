<?php

namespace App\Controller;

use App\Utils\MathUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FactController extends AbstractController{
    #[Route('/fact/{n}', name: 'app_fact',requirements:['n'=>'\d+'])]
    public function index(int $n): Response
    {
        $result =MathUtils::factorielle($n);
        return new Response("{$n}!={$result}");
    }

    #[Route('/combi/{n}/{p}',name:'combi',requirements:['n'=>'\d+','p'=>'\d+'])]
    public function combi(int $n,int $p):Response
    {

        $result=MathUtils::factorielle($n,$p);
        return new Response("C{$n} {$p}={$result}");
    }



}
