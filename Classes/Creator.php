<?php

namespace App;


use Interfaces\IPayment;


/**
 * Class Creator
 * @package App
 */
abstract class Creator
{
    /**
     * @return IPayment
     */
    abstract public function factoryPayment(): IPayment;


    /**
     * @return string
     */
    public function pay(): string
    {
        $payment = $this->factoryPayment();

        return $payment->pay();
    }
}
