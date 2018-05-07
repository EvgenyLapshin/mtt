<?php
require_once 'Form.php';

class Check extends Form
{
    public $isGuest = true;
    public $id;
    public $username;
    public $password_hash;

    public function run()
    {
        if (!empty($_COOKIE['id']) && !empty($_COOKIE['hash'])) {
            $this->setUser($_COOKIE['id']);

            if (($this->password_hash !== $_COOKIE['hash']) || ($this->id !== $_COOKIE['id'])) {
                $this->clearCookie();
                $this->addError('Неверно установлены COOKIE');
                $this->printErrors();
            }
        }
    }

    protected function setUser($id)
    {
        $query = $this->connection->query("SELECT * FROM user WHERE id = '" . intval($id) . "' LIMIT 1");

        if ($query->num_rows) {
            $data = $query->fetch_assoc();
            $this->id = $data['id'];
            $this->username = $data['username'];
            $this->password_hash = $data['password_hash'];

            $this->isGuest = false;
        } else {
            $this->isGuest = true;
        }
    }

    public function clearCookie()
    {
        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/");
    }
}