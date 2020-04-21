<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('vendor/autoload.php');


use App\Director;
use App\ContactBuilder;


/**
 * @param Director $director
 */
function clientCodeContact(Director $director)
{
    $builder = new ContactBuilder();
    $director->setBuilder($builder);
    $director->setName('John')
             ->setSurname('Surname')
             ->setPhone('067-122-55-77')
             ->setEmail('john@email.com')
             ->setAddress("Some address");

    echo $builder->getContact()->build();
}

$director = new Director();
clientCodeContact($director);
