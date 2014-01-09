<?php

$letter = 'A';

$m = ord($letter); // ASCII code of letter 'A'
$d = 2753;

$e = 17;
$n = 3233;

echo "Encryption / Decryption using BC:\n";
$c = bcmod(bcpow($m, $e, 40), $n);
$res = bcmod(bcpow($c, $d, 40), $n);

echo "Original data: $letter\n";
echo "Encrypted data: $c\n";
echo "Decryption:\n";
echo "Input: $c\n";
echo "Decrypted: $res\n";
echo "The letter is: ".chr($res)."\n";

echo "=========================\n";
echo "Encryption / Decryption using GMP:\n";
$c = gmp_powm($m, $e, $n);
$res = gmp_powm($c, $d, $n);

echo "Original data: $letter\n";
echo "Encrypted data:".gmp_strval($c)." \n";
echo "Decryption:\n";
echo "Input: ".gmp_strval($c)."\n";
echo "Decrypted: ".gmp_strval($res)."\n";
echo "The letter is: ".chr(gmp_strval($res))."\n";



