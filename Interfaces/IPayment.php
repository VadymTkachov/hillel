<?php


namespace Interfaces;


/**
 * Interface IPayment
 * @package Interfaces
 */
interface IPayment
{
    /**
     * @return int
     */
    public function connect(): int;

    /**
     * @return string
     */
    public function pay(): string;
}