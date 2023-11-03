<?php

namespace src\models;

use src\core\Model;


class User extends Model
{
    public array $data = [];


    // Получение данных для юзера из БД
    public function getDataFromDB() : array
    {
        $params = [
            'login' => $_SESSION['authorize'],
        ];
        $this->data = $this->db->row("SELECT name, phone_number, email, login FROM users WHERE login = :login", $params);
        return $this->data;
    }


    // Обновление БД сведений о юзере
    public function updateName() : void
    {
        $params = [
            'name' => $_POST['name'],
            'login' => $_SESSION['authorize'],
        ];

        $this->db->query("UPDATE users SET name = :name WHERE login = :login", $params);
    }


    // Обновление емейла в БД
    public function updateEmail() : void
    {
        $params = [
            'email' => $_POST['email'],
            'login' => $_SESSION['authorize'],
        ];

        $this->db->query("UPDATE users SET email = :email WHERE login = :login", $params);
    }


    // Обновление номера телефона в БД
    public function updatePhoneNumber() : void
    {
        $params = [
            'phone_number' => $_POST['phone_number'],
            'login' => $_SESSION['authorize'],
        ];

        $this->db->query("UPDATE users SET phone_number = :phone_number WHERE login = :login", $params);
    }


    // Обновление пароля в БД
    public function updatePassword() : void
    {
        $params = [
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'login' => $_SESSION['authorize'],
        ];

        $this->db->query("UPDATE users SET password = :password WHERE login = :login", $params);
    }
}
