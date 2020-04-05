<?php


namespace App;


class RegularExpression
{

    // @param int
    private $quantity;


    // Constructor
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * @param string $text
     * @return false|int
     */
    public function isRegNumber(string $text)
    {
        return preg_match("/^(\d){1,$this->quantity}$/i", $text);
    }


    /**
     * @param string $text
     * @return string|string[]|null
     */
    public function doubleSpaceReplace(string $text)
    {
        return preg_replace('/(\s){2,}/i', ' ', $text);
    }


    /**
     * @param string $html
     * @param string $tagName
     * @return mixed
     */
    public function findTextByTag(string $html, string $tagName)
    {
        preg_match_all("/<{$tagName}>(.*)<\/{$tagName}>/i", $html, $out);
        return $out[1];
    }
}
