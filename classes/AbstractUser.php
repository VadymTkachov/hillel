<?php

namespace classes;


// Abstract Class User
abstract class AbstractUser
{

    // @int
    public $summ;

    // Constructor
    public function __construct($revenue)
    {
        $this->summ = $revenue;
    }

    // Abstract Method
    abstract public function increaseRevenue($summ);
}
