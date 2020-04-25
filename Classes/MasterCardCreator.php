<?php

namespace App;


use Interfaces\IPayment;


/**
 * Class MasterCardCreator
 * @package App
 */
class MasterCardCreator extends Creator
{
    /**
     * @return IPayment
     */
    public function factoryPayment(): IPayment
    {
        return new MasterCard();
    }
}
