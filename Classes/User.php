<?php


class User
{
    private $name;

    private $age;

    private $email;


    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func([$this, $name], $arguments);
        } else {
            echo "Method {$name} is not exists!";
        }
    }


    public function getAll()
    {
        return [
            'name'  => $this->name,
            'age'   => $this->age,
            'email' => $this->email
        ];
    }


    private function setName($name = '')
    {
        $this->name = $name;
    }


    private function setAge($age = 0)
    {
        $this->age = $age;
    }
}

$user = new User();
$user->setEmail('test@test.com');
$user->setName('Vadim');
$user->setAge(35);
var_dump($user->getAll());
