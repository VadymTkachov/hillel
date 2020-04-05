<?php


namespace App;


class Show
{

    // @param string
    private $form;

    // Constructor
    public function __construct()
    {
        $this->form = file_get_contents(ROOT . '/inc/form-register.php');
    }


    // Show Form
    public function showForm(string $message = '', string $status = 'success')
    {
        $form = $this->form;
        $form = preg_replace('/\[message\]/', $this->getMessage($message, $status), $form);
        $form = preg_replace('/\[USERNAME\]/', $this->getFieldValue('username', 'user_data'), $form);
        $form = preg_replace('/\[PASSWORD\]/', $this->getFieldValue('password', 'user_data'), $form);
        $form = preg_replace('/\[EMAIL\]/', $this->getFieldValue('email', 'user_data'), $form);
        $form = preg_replace('/\[USERINFO\]/', $this->getFieldValue('userinfo', 'user_data'), $form);

        echo $form;
    }


    public function getFieldValue(string $name, string $key)
    {
        if (!empty($key)) {
            return !empty($_SESSION[$key][$name]) ? $_SESSION[$key][$name] : '';
        }

        return !empty($_SESSION[$name]) ? $_SESSION[$name] : '';
    }

    /**
     * @param string $message
     * @param string $status
     * @return string
     */
    public function getMessage(string $message, string $status)
    {
        $message = !empty($_SESSION['message']['text']) ? $_SESSION['message']['text'] : $message;
        $status = !empty($_SESSION['message']['status']) ? $_SESSION['message']['status'] : $status;
        unset($_SESSION['message']); // Message cleaner

        if (empty($message)) {
            return '';
        }

        switch ($status) {
            case 'success':
                {
                    $message = "<div class='alert alert-success' role='alert' >
                        <strong >Success!</strong > {$message}
                    </div>";
                }
                break;
            case 'info':
                {
                    $message = "<div class='alert alert-info' role='alert'>
                        <strong>Heads up!</strong> {$message}
                    </div>";
                }
                break;
            case 'warning':
                {
                    $message = "<div class='alert alert-warning' role='alert'>
                        <strong>Warning!</strong> {$message}
                    </div>";
                }
                break;
            case 'danger':
                {
                    $message = "<div class='alert alert-danger' role='alert'>
                        <strong>Oh snap!</strong> {$message}
                    </div>";
                }
                break;
        }

        return $message;
    }



}
