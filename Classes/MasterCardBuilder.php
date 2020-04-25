<?php


namespace App;


use Interfaces\IPayment;


/**
 * Class MasterCard
 * @package App
 */
class MasterCard implements IPayment
{
    /**
     * @return int
     */
    public function connect(): int
    {
        return 355;
    }


    /**
     * @return string
     */
    public function pay(): string
    {
        $connectId = $this->connect();
        $result    = "ID Connection is: {$connectId}. This has been pied success full!";

        return $result;
    }
}
