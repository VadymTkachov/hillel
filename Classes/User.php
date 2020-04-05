<?php


namespace App;

use Exception;


class User
{
    // @param int
    private int $id = 0;

    // @param string
    private string $email = '';

    // @param string
    private string $password = '';


    /**
     * User constructor.
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id, $email, $password)
    {
        try {
            if ('integer' !== gettype($id)) {
                throw new Exception("Exception: ID is not valid type!");
            }

            if ('string' !== gettype($email)) {
                throw new Exception("Exception: EMAIL is not valid type!");
            }

            if (strlen($password) > 8) {
                throw new Exception("Exception: PASSWORD must not exceed 8 characters!");
            }

            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
        } catch (Exception $e) {
            echo "<pre>" . print_r(
                    $e->getMessage() . '; In File: ' . $e->getFile() . '; Line: ' . $e->getLine(),
                    true
                ) . "</pre>";
        }
    }


    /**
     * @return string
     */
    public function getUserData()
    {
        return 'Id: ' . $this->id . ', Email: ' . $this->email . ', Password: ' . $this->password;
    }
}