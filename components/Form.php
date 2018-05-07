<?php

/**
 * Class Form
 *
 * @property mysqli $connection
 * @property array $errors
 */
class Form
{
    protected $connection;
    private $_errors = array();

    public function __construct()
    {
        $this->connection = @new mysqli("localhost", "root", "", "mtt");
        if ($this->connection->connect_errno) {
            $this->addError('Ошибка при подеключении к БД');
            $this->printErrors();
            exit;
        }
    }

    public function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function printErrors()
    {
        foreach ($this->getErrors() as $error) {
            echo $error . '<br>';
        }
    }

    public function hasErrors()
    {
        return (boolean) $this->getErrors();
    }

    public function clearErrors()
    {
        $this->_errors = [];
    }

    public function setProperties($list)
    {
        if (is_array($list)) {
            foreach ($list as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function __destruct()
    {
        if (!$this->connection->connect_errno) {
            $this->connection->close();
        }
    }
}