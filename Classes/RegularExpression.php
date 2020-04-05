<?php


namespace App;


class RegularExpression
{

    // @param int
    private $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param string $text
     */
    public function isRegNumber(string $text)
    {
        return preg_match("/^(\d){1,$this->quantity}$/i", $text);
    }
}
