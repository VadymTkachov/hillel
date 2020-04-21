<?php


namespace App\Interfaces;

/**
 * Interface IBuilder
 * @package App\Interfaces
 */
interface IBuilder
{
    /**
     * Reset
     */
    public function reset(): void;

    /**
     * Pay
     */
    public function pay(): void;

    /**
     * @return mixed
     */
    public function getResult();
}