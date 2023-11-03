<?php 

namespace src\core;

use src\lib\Db;


abstract class Model
{
    public Db $db;
    

    public function __construct()
    {
        $this->db = new Db();
    }


    // Проверка на существование логина в БД
    public function checkLoginExists() : bool
    {
        $params = [
            'login' => $_POST['login'],
        ];

        if ($this->db->column('SELECT id FROM users WHERE login = :login', $params)) {
            return false;
        } else {
            return true;
        }
    }


    // Проверка номера телефона на существование в БД
    public function checkPhoneExist() : bool
    {
        $params = [
            'phone_number'=> $_POST['phone_number'],
        ];

        if ($this->db->column('SELECT id FROM users WHERE phone_number = :phone_number', $params)) {
            return false;
        } else {
            return true;
        }
    }


    // Проверка на существование емейла в БД
    public function checkEmailExist() : bool
    {
        $params = [
            'email'=> $_POST['email'],
        ];

        if ($this->db->column('SELECT id FROM users WHERE email = :email', $params)) {
            return false;
        } else {
            return true;
        }
    }
}
