<?php


namespace App;


use App\Interfaces\IBuilder;

/**
 * Class Director
 * @package App
 */
class Director
{
    /**
     * @var IBuilder
     */
    private IBuilder $builder;


    /**
     * @param IBuilder $builder
     */
    public function setBuilder(IBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Reset
     */
    public function reset(): void
    {
        $this->builder->reset();
    }

    /**
     * @param $name
     *
     * @return \App\Classes\Director
     */
    public function setName($name): Director
    {
        $this->builder->setName($name);

        return $this;
    }

    /**
     * @param $surname
     *
     * @return $this
     */
    public function setSurname($surname): Director
    {
        $this->builder->setSurname($surname);

        return $this;
    }

    /**
     * @param $phone
     *
     * @return $this
     */
    public function setPhone($phone): Director
    {
        $this->builder->setPhone($phone);

        return $this;
    }

    /**
     * @param $address
     *
     * @return $this
     */
    public function setAddress($address): Director
    {
        $this->builder->setAddress($address);

        return $this;
    }

    /**
     * @param $email
     *
     * @return $this
     */
    public function setEmail($email): Director
    {
        $this->builder->setEmail($email);

        return $this;
    }
}
