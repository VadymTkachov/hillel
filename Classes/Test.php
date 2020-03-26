<?php

include_once(__DIR__ . '/Traits/Trait1.php');
include_once(__DIR__ . '/Traits/Trait2.php');
include_once(__DIR__ . '/Traits/Trait3.php');


class Test
{
    use Trait1, Trait2, Trait3 {
        Trait2::method insteadof Trait3;
        Trait3::method insteadof Trait2;
        Trait2::method as method2;
        Trait3::method as method3;
    }

    public function getSum()
    {
        return $this->method() + $this->method2() + $this->method3();
    }
}


$test = new Test();
$sum  = $test->getSum();
echo 'Summ = ' . $sum;
