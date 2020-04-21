<?php


namespace App;


use App\Interfaces\IBuilder;


/**
 * Class ContactBuilder
 * @package App
 */
class ContactBuilder implements IBuilder
{
    /**
     * @var Contact
     */
    private Contact $contact;


    /**
     * ContactBuilder constructor.
     */
    public function __construct()
    {
        $this->reset();
    }


    /**
     * Reset
     */
    public function reset(): void
    {
        $this->contact = new Contact;
    }


    /**
     * @param $name
     */
    public function setName($name): void
    {
        $this->contact->params['name'] = $name;
    }

    /**
     * @param $surname
     */
    public function setSurname($surname): void
    {
        $this->contact->params['surname'] = $surname;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone): void
    {
        $this->contact->params['phone'] = $phone;
    }

    /**
     * @param $address
     */
    public function setAddress($address): void
    {
        $this->contact->params['address'] = $address;
    }

    /**
     * @param $email
     */
    public function setEmail($email): void
    {
        $this->contact->params['email'] = $email;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        $result = $this->contact;
        $this->reset();

        return $result;
    }
}
