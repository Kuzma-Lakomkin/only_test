<?php 

namespace src\models;

use src\core\Model;


class Account extends Model
{
    //Добавление нового юзера в БД
    public function addUserToBase() : void
    {
        $params = [
            'name' => $_POST['name'],
            'phone_number' => $_POST['phone_number'],
            'email' => $_POST['email'],
            'login' => $_POST['login'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),

        ];

        $this->db->query('INSERT INTO users (name, phone_number, email, login, password)
                    VALUE (:name, :phone_number, :email, :login, :password)', $params); 
    }
    
    
    // Авторизация
    public function entryToApplication() : bool
    {
        $params = [
            'login' => $_POST['name'],
        ];
        $pattern = '/^\+/';
        if (preg_match($pattern, $_POST['name'])) {
            $hashedPassword = $this->db->column('SELECT password FROM users WHERE phone_number = :login', $params);
        } else {
            $hashedPassword = $this->db->column('SELECT password FROM users WHERE email = :login', $params);
        }

        if (password_verify($_POST['password'], $hashedPassword)) {
            if (preg_match($pattern, $_POST['name'])) {
                $_SESSION['authorize'] = $this->db->column('SELECT login FROM users WHERE phone_number = :login', $params);
            } else {
                $_SESSION['authorize'] = $this->db->column('SELECT login FROM users WHERE email = :login', $params);
            }
            return true;
        } else {
            return false;
        }
    }
}   
