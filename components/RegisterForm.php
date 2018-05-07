<?php
require_once 'Form.php';

class RegisterForm extends Form
{
    public $login;
    public $password;

    public function run()
    {
        if ($this->login && $this->password) {
            $this->validateLogin();
            $this->validatePassword();

            if ($this->hasErrors()) {
                $this->printErrors();
            } else {
                $this->createUser();
                $this->redirectToLogin();
            }
        }
    }

    protected function validateLogin()
    {
        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->login)) {
            $this->addError('Логин может состоять только из букв английского алфавита и цифр');
        }

        if (strlen($this->login) < 4 || strlen($this->login) > 50) {
            $this->addError('Логин должен быть не меньше 4-х символов и не больше 50');
        }

        $query = $this->connection->query("SELECT id FROM user WHERE username='" . $this->connection->real_escape_string($this->login) . "'");
        if ($query->num_rows > 0) {
            $this->addError('Пользователь с таким логином уже существует в базе данных');
        }
    }

    protected function validatePassword()
    {
        if (strlen($this->password) < 4 || strlen($this->password) > 60) {
            $this->addError('Пароль должен быть не меньше 4-х символов и не больше 60');
        }

        $this->password = md5(md5(trim($this->password)));
    }

    protected function createUser()
    {
        $this->connection->query("INSERT INTO user SET username='" . $this->connection->real_escape_string($this->login) . "', auth_key='" . $this->connection->real_escape_string($this->password) . "'");

    }

    protected function redirectToLogin()
    {
        header("Location: login.php");
        exit();
    }
}