<?php

namespace App\Controller;

use App\Utils\MathUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FactController extends AbstractController{



    #[Route('/fact/{n}', name: 'app_fact',requirements:['n'=>'\d+'])]
    public function fact(int $n): Response
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

    
    #[Route('/',name:'home')]
    public function index(Request $request):Response
    {
      
        $n=$request->query->get('n');
        $p=$request->query->get('p');
        $result=null;
        $calculationType = null;
        if($n!=null && is_numeric($n))
        {
            $n=(int) $n;
            $result=MathUtils::factorielle($n);
            $calculationType = "Factorielle de {$n}";
        }

        if($n!=null && is_numeric($n) && $p!=null && is_numeric($p))
        {

            $n=(int) $n;
            $p=(int) $p;
       
            if ($p > $n) {
                $result = "Erreur : p ne peut pas être supérieur à n";
            } else {
                $result = MathUtils::combinaison($n, $p);
                $calculationType = "Combinaison C($n, $p)";
            }

      
        }
        return $this->render('index.html.twig', [
            'result' => $result,
            'calculationType' => $calculationType,
            'n' => $n,
            'p' => $p
        ]);
    }
}
