<?php

namespace classes;

use \classes\AbstractUser as User;


// Class Employee
class Employee extends User
{

    public function increaseRevenue($summ)
    {
        $this->summ = $this->summ + $summ;
    }
}
