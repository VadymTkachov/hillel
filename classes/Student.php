<?php

namespace classes;

use classes\AbstractUser as User;


// Class Student
class Student extends User
{

    public function increaseRevenue($summ)
    {
        $this->summ = $this->summ + $summ;
    }

}
