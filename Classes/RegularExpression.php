<?php


namespace App;


class RegularExpression
{

    // @param int
    private $quantity;


    // Constructor
    public function __construct(int $quantity = 0)
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


    /**
     * @param string $text
     * @param int $quantity
     * @return false|int
     */
    public function isStringLength(string $text, int $quantity)
    {
        return preg_match("/^.{1,$quantity}$/i", $text);
    }


    /**
     * @param $password
     * @return false|int
     */
    public function isPassword($password)
    {
        return preg_match("/^([a-z]|[A-Z]|[а-я]|[А-Я]|_|-|\d){8,}$/iu", $password);
    }


    /**
     * @param $email
     * @return false|int
     */
    public function isEmail($email)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
    }


    /**
     * @param string $text
     * @return string|string[]|null
     */
    public function toLowercase(string $text)
    {
        return preg_replace_callback(
            '/([A-Z])/u',
            function ($word) {
                return mb_strtolower($word[1], 'UTF-8');
            },
            $text
        );
    }
}
