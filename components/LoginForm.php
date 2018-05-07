<?php
require_once 'Form.php';

class LoginForm extends Form
{
    public $login;
    public $password;
    public $errorMessage = 'Неверный логин или пароль';

    public function run()
    {
        if ($this->login && $this->password) {
            $query = $this->connection->query("SELECT id, auth_key FROM user WHERE username='" . $this->connection->real_escape_string($this->login) . "' LIMIT 1");

            if (!$query->num_rows) {
                $this->addError($this->errorMessage);
            } else {
                $data = $query->fetch_assoc();

                if ($data['auth_key'] === md5(md5($this->password))) {
                    $hash = md5($this->generateCode());
                    $this->connection->query("UPDATE user SET password_hash='" . $hash . "' WHERE id='" . $data['id'] . "'");

                    setcookie("id", $data['id'], time() + 60 * 60 * 24 * 30);
                    setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, null, null, null, true);

                    $this->redirectToIndex();
                } else {
                    $this->addError($this->errorMessage);
                }
            }

            if ($this->hasErrors()) {
                $this->printErrors();
            }
        }
    }

    protected function generateCode($length = 10)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }

        return $code;
    }

    protected function redirectToIndex()
    {
        header("Location: index.php");
        exit();
    }
}