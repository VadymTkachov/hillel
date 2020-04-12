<?php


namespace App;


class Logger
{
    /**
     * @var IFormat
     */
    private $format;

    /**
     * @var IDelivery
     */
    private $delivery;


    /**
     * Logger constructor.
     *
     * @param IFormat $format
     * @param IDelivery $delivery
     */
    public function __construct(IFormat $format, IDelivery $delivery)
    {
        $this->format   = $format;
        $this->delivery = $delivery;
    }


    /**
     * @param $string
     */
    public function log($string)
    {
        $this->delivery->getDelivery($this->format->getFormat($string));
    }
}


/**
 * Interface IFormat
 * @package App
 */
interface IFormat
{
    public function getFormat(string $string);
}


/**
 * Interface IDelivery
 * @package App
 */
interface IDelivery
{
    public function getDelivery(string $string);
}


/**
 * Class FormatWithDate
 * @package App
 */
class FormatRow implements IFormat
{
    public function getFormat(string $string)
    {
        return $string;
    }
}


/**
 * Class FormatWithDate
 * @package App
 */
class FormatWithDate implements IFormat
{
    public function getFormat(string $string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}


/**
 * Class FormatWithDateAndDetails
 * @package App
 */
class FormatWithDateAndDetails implements IFormat
{
    public function getFormat(string $string)
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}


/***
 * Class DeliveryByEmail
 * @package App
 */
class DeliveryByEmail implements IDelivery
{
    public function getDelivery(string $string)
    {
        echo "Вывод формата ({$string}) по имейл";
    }
}


/**
 * Class DeliveryBySms
 * @package App
 */
class DeliveryBySms implements IDelivery
{
    public function getDelivery(string $string)
    {
        echo "Вывод формата ({$string}) в смс";
    }
}


/**
 * Class DeliveryToConsole
 * @package App
 */
class DeliveryToConsole implements IDelivery
{
    public function getDelivery(string $string)
    {
        echo "Вывод формата ({$string}) в консоль";
    }
}
