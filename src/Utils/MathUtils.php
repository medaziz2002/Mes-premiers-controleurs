<?php

namespace App\Utils;
class MathUtils
{
    public static function factorielle(int $n): int
    {
        if ($n < 0) {
            throw new \InvalidArgumentException("n doit être un entier positif");
        }
        return ($n === 0) ? 1 : $n * self::factorielle($n - 1);
    }


   public static function combinaison(int $n,int $p): int
   {

    if ($n < 0) {
        throw new \InvalidArgumentException("n  doit être un entier positif");
    }

    if ($p < 0) {
        throw new \InvalidArgumentException("p  doit être un entier positif");
    }

    if ($p > $n) {
        throw new \InvalidArgumentException("p ne peut pas être supérieur à n");
    }
    
    return self::factorielle($n)/self::factorielle($p)*($n-$p);

   }








}
