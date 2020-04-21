<?php


namespace App;


use App\Interfaces\IBuilder;


/**
 * Class MasterCardBuilder
 * @package App
 */
class MasterCardBuilder implements IBuilder
{
    /**
     * @var MasterCard
     */
    private MasterCard $masterCard;


    /**
     * MasterCardBuilder constructor.
     */
    public function __construct()
    {
        $this->reset();
        $this->masterCard->params['method'] = 'MasterCard';
    }


    /**
     * Reset
     */
    public function reset(): void
    {
        $this->masterCard = new MasterCard();
    }


    /**
     * Pay
     */
    public function pay(): void
    {
        $this->masterCard->params['status'] = 'Was paid';
    }


    /**
     * @return MasterCard|mixed
     */
    public function getResult()
    {
        $result = $this->masterCard;
        $this->reset();

        return $result;
    }
}
