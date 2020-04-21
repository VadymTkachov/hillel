<?php


namespace App\Interfaces;


/**
 * Interface IBuilder
 * @package App\Interfaces
 */
interface IBuilder
{
    /**
     *
     */
    public function reset(): void;

    /**
     * @param $name
     */
    public function setName($name): void;

    /**
     * @param $surname
     */
    public function setSurname($surname): void;

    /**
     * @param $phone
     */
    public function setPhone($phone): void;

    /**
     * @param $address
     */
    public function setAddress($address): void;

    /**
     * @param $email
     */
    public function setEmail($email): void;

    /**
     * @return mixed
     */
    public function getContact();
}
