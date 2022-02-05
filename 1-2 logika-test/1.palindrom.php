<?php


// TODO 2
function isPalindrom_1($word)
{

      for ($i = 0; $i < strlen($word) / 2; $i++) {
            $index_awal = $i;
            $index_akhir = strlen($word) - 1 - $i;

            if ($word[$index_awal] === $word[$index_akhir]) {
                  return "PALINROM";
            } else {
                  return "NOT PALINDROM";
            }
      }
}
// print_r(isPalindrom_1("MALAM")); //true
// print_r(isPalindrom_1("KAKAK")); //true
// print_r(isPalindrom_1("APA")); //true
// print_r(isPalindrom_1("PAPA")); //false
