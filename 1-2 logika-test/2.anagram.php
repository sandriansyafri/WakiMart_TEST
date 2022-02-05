<?php

function is_anagram($word1, $word2)
{
      $result = false;

      if ($word1 && $word2) {
            $word1 = str_split(str_replace(" ", "", strtolower($word1)));
            $word2 = str_split(str_replace(" ", "", strtolower($word2)));

            sort($word1);
            sort($word2);

            $result = $word1 === $word2;
      }

      return $result ? "ANAGRAM" : "NOT ANAGRAM";
}

// print_r(is_anagram("ABC", "CBA"));  //true
// print_r(is_anagram("OKKO", "KKOO")); //true
// print_r(is_anagram("MLAMA", "MAMAL")); //true
// print_r(is_anagram("RWWUSEH", "HWURWES")); //true
// print_r(is_anagram("ADFG", "AGF")); //false
// print_r(is_anagram("ABC", "BCD")); //false
// print_r(is_anagram("SAYA", "YASO")); //false
