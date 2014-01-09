<?php
//Common setup
$n=999999; // Ending
$i=1; // Current n
$p=100;

// BC portion of the code
$pi2=bcdiv(0, 1, $p);

$time1=  time();
while($i<=$n)
{
    $pi2=bcadd(bcdiv(1, bcmul($i, $i), $p), $pi2, $p);
    $i++;
}
$time2=time();
$res1=bcsqrt(bcmul($pi2,6, $p), $p)."\n";
echo $res1;
echo "Time elapsed:".($time2-$time1)."s\n";

//php-bignumbers
require_once 'vendor/autoload.php';
use \Litipk\BigNumbers\Decimal as dec;

$pi2=dec::fromInteger(0, $p);
$one=dec::fromInteger(1);
$i=1;
$time1=  time();
while($i<=$n)
{
    $tmp=dec::fromInteger($i);
    $pi2=$pi2->add($one->div($tmp->mul($tmp, $p), $p), $p);
    $i++;
}
$res2=$pi2->mul(dec::fromInteger(6), $p)->sqrt();
$time2=  time();
echo $res2."\n";
echo "Time elapsed:".($time2-$time1)."s\n";

//Compare the output
echo "---------------------------------------------------\n";
$len=strlen($res1);
for($i=2;$i<$len;$i++)
{
    if($res1[$i]<>$res2[$i])
    {
        echo "Two results differs in $i digits out of $len length.\n";
        break;
    }
}

// Rely on no additional lib
$i=1;
$res3=0.0;
$time1=  time();
while($i<$n)
{
    $res3+=(1.0)/$i/$i;
    $i++;
}

$res3=  sqrt($res3*6);
$time2=  time();

echo $res3."\n";
echo "Time elapsed:".($time2-$time1)."s\n";
