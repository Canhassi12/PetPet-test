<?php

/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*
Um palíndromo é uma palavra que pode ser lida  da mesma maneira da esquerda para direita, como ao contrário.
Exemplo: ASA.

Faça uma função que ao receber um input de uma palavra, string, verifica se é um palíndromo retornando verdadeiro ou falso.
O fato de um caracter ser maiúsculo ou mínusculo não deverá influenciar no resultado da função.

Exemplo: isPalindrome("Asa") deve retonar true.
*/

class Palindrome
{
    public static function isPalindrome(string $word): bool
    {
        $response = "";
        $len = strlen($word);
        $letters = str_split($word, 1);

        for($i = $len - 1; $i > -1; $i--) {
            $response = $response . $letters[$i];
        }
        $response = strtolower($response);

        if ($response === strtolower($word)) {
            return true;
        }
        return false;
    }
}

echo Palindrome::isPalindrome('Deleveled');
