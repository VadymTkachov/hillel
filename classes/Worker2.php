<?php


class Worker2 {

    // String
    private $name;

    // @int
    private $salary;

    // @int
    private $age;


    // Constructor
    public function __construct( $name, $age, $salary ) {

        if ( 18 > $age || 99 < $age ) {
            echo "User must be correct age!";

            return false;
        }


        $this->name   = $name;
        $this->age    = $age;
        $this->salary = $salary;

    }


    // Get Name
    public function getName() {
        return $this->name;
    }


    // Get Age
    public function getAge() {
        return $this->age;
    }


    // Get Salary
    public function getSalary() {
        return $this->salary;
    }
}

// Create Worker Object
$worker2 = new Worker2( 'Jack', 25, 1000 );

if ( empty( $worker2->getAge() ) ) {
    unset( $worker2 );
}

// Display product of age and salary
if ( ! empty( $worker2->getAge() ) ) {
    print_r( $worker2->getAge() * $worker2->getSalary() );
}
