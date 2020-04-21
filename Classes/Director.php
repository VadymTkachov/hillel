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
     * Pay method
     */
    public function pay(): void
    {
        $this->builder->pay();
    }


    /**
     * Build method
     */
    public function build(): void
    {
        $result = $this->builder->getResult();
        $result->build();
    }
}
