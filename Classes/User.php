<?php

namespace App;

use App\Show;
use App\RegularExpression as Regular;


class User
{
    // @param string
    private $form;

    // @param array
    private $userParams;

    // @param array
    private $messages = [];

    // @param RegularExpression
    private $regular;


    // Constructor
    public function __construct()
    {
        $this->form = new Show();
        $this->init();
    }


    public function init()
    {
        $this->messages = [
            'success' => 'User was created successfully!',
            'info' => 'All fields with (*) must be filled!',
            'warning' => 'Please fill in all fields',
            'danger' => 'An error occurred!',
        ];

        if (!empty($_GET['user'])) {
            $this->regular = new Regular();
            $this->userParams = $_GET['user'];
            $this->exec();
        }
    }


    // Show form
    public function showForm()
    {
        $this->form->showForm();
    }


    /**
     * @param string $url
     * @param int $status
     */
    public function redirect(string $url, int $status = 301)
    {
        header("HTTP/1.1 {$status} Moved Permanently");
        header("Location: " . $url);
        exit();
    }


    public function exec()
    {
        $message = '';

        if (empty($this->regular->isStringLength($this->userParams['username'], 15))) {
            $message .= 'The <strong>username</strong> field must not exceed 15 characters!';
        }

        if (empty($this->regular->isPassword($this->userParams['password']))) {
            $message .= '<br>The <strong>password</strong> field must be more than 8 characters and may include following symbols: letters, numbers, \'_\', \'-\'!';
        }

        if (empty($this->regular->isEmail($this->userParams['email']))) {
            $message .= '<br>The <strong>email</strong> field is not correct!';
        }

        $this->userParams['userinfo'] = $this->regular->toLowercase($this->userParams['userinfo']);

        if (!empty($message)) {
            $this->setMessage($message, 'danger');
            $this->setSession('user_data', $this->userParams);
            $this->redirect('http://' . $_SERVER['SERVER_NAME']);
        }

        $this->unsetSession('user_data');
        $this->setMessage($this->messages['success']);
        $this->redirect('http://' . $_SERVER['SERVER_NAME']);
    }


    /**
     * @param string $name
     * @param mixed string|array $param
     */
    public function setSession(string $name, $param)
    {
        if (is_array($param)) {
            foreach ($param as $paramName => $paramValue) {
                $_SESSION[$name][$paramName] = $paramValue;
            }
        } else {
            $_SESSION[$name] = $param;
        }
    }


    /**
     * @param string $name
     */
    public function unsetSession(string $name)
    {
        unset($_SESSION[$name]);
    }


    /**
     * @param string $message
     * @param string $status
     */
    public function setMessage(string $message, string $status = '')
    {
        $_SESSION['message'] = [
            'text' => $message,
            'status' => $status,
        ];
    }
}