<?php

// Below is to test php-bignumber lib
require_once 'vendor/autoload.php';

use \Litipk\BigNumbers\Decimal as Decimal;

$one = Decimal::fromInteger(1);
$two= Decimal::fromInteger(2);
$three=Decimal::fromInteger(3);
$seven = Decimal::fromString('7.0');

$a=$one->div($seven, 100); // Should display something like 0.142857142857 .....and the last digit is 9. 
$b=$two->div($seven, 100);
$c=$three->div($seven, 100);

echo ($c->sub(($a->add($b)))); //Displays 0.00000... to the last digit

echo "\n";

// Now we test GMP

echo gmp_strval(gmp_div("1.0", "7.0")); //Displays 0. Not really useful!
echo "\n";

// Now we test BC

$oneseven=bcdiv('1', '7', 100); // Should display something like 0.142857142857 .....but note the last digit is 8, not 9
$twoseven=bcdiv('2','7', 100);
$threeseven=bcdiv('3','7', 100);

echo bcsub(bcadd($oneseven, $twoseven,100), $threeseven, 100); // Displays 0.000000000... to the last digit
echo "\n";

?>