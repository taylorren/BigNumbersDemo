<?php

$letters = ['W','e','l','c','o','m','e'];

foreach($letters as $letter)
{
	$p1=881;
	$p2=883;
	$n = $p1*$p2;	
	$e = 17; // must coprimes with (p1-1)*(p2-1)=phi(n)
	$d = 91313; // d*e = 1 mod (phi(n))
	


	echo $letter."\t";

	$m = ord($letter); // ASCII code of letter 'A'

	$c = bcmod(bcpow($m, $e, 0), $n);
	$res = bcmod(bcpow($c, $d, 0), $n);

	echo "$c\t";
	echo "Decrypted: $res\t";
	echo "The letter is: ".chr($res)."\n";
}
