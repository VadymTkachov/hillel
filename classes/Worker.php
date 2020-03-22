<?php


class Worker {

    // @array
    public $params;

    public function setParams( $name, $age, $salary ) {

        $this->params = [
            'name'   => $name,
            'age'    => $age,
            'salary' => $salary,
        ];

    }
}


// Worker #3
$worker1 = new Worker();
$worker1->setParams( 'John', 25, 1000 );


// Worker #2
$worker2 = new Worker();
$worker2->setParams( 'Vasya', 26, 2000 );


$salary_summ = $worker1->params['salary'] + $worker2->params['salary'];
$age_summ    = $worker1->params['age'] + $worker2->params['age'];


echo "<pre>";
print_r( "Salary summ {$worker1->params['name']} + {$worker2->params['name']} = {$salary_summ}\n" );
print_r( "Age summ  {$worker1->params['name']} + {$worker2->params['name']} = {$age_summ}\n" );
echo "</pre>";
