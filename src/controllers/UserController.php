<?php 

namespace src\controllers;

use src\core\Controller;


class UserController extends Controller
{
    public array $vars;

    // Главная страница для юзера
    public function homeAction()
    {   
        $this->vars =[
            'data' => $this->model->getDataFromDB(),
        ];
        // Валидация при изменения имени
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            if (!empty($_POST['name'])) {
                $pattern = '/^[\p{L}]{1,50}$/u';
                if (preg_match($pattern, $_POST['name'])) { 
                    $this->model->updateName();
                } else {
                    $this->errors = [['Поле "Имя" должно содержать от 1 до 50 символов']];
                    $this->getErrors();
                }
            }
            
            // Валидация при изменении емейла
            if (!empty($_POST['email'])) {
                $pattern = '/^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$/';
                if (preg_match($pattern, $_POST['email'])) {
                    if ($this->model->checkEmailExist($_POST['email'])) {
                        $this->model->updateEmail();
                    } else {
                        $this->errors = [['Этот емейл уже занят']];
                        $this->getErrors();
                    }
                } else {
                    $this->errors = [['Поле "E-mail" должно содержать от 1 до 50 символов не является валидным email адресом!']];
                    $this->getErrors();
                };
            }

            // Валидация при изменении номера телефона
            if (!empty($_POST['phone_number'])) {
                $pattern = '/^\+[0-9]{10,15}$/';
                if (preg_match($pattern, $_POST['phone_number'])) {
                    if ($this->model->checkPhoneExist($_POST['phone_number'])) {
                        $this->model->updatePhoneNumber();
                    } else {
                        $this->errors = [['Данный номер уже используется!']];
                        $this->getErrors();
                    }
                } else {
                    $this->errors = [['Номер телефона должен содержать от 11 до 15 символов и начинаться с +']];
                    $this->getErrors();
                }
            }

            // Валидация при изменении пароля
            if (!empty($_POST['password'])) {
                $pattern = '/^(?![\s])[^\s]{8,50}$/';
                if (preg_match($pattern, $_POST['password'])) {
                    $this->model->updatePassword();
                } else {
                    $this->errors = [['Пароль должно содержать от 8 до 50 символов без пробелов']];
                    $this->getErrors();
                }
            }
        }
        $this->view->render("Страница с личной анкетой", $this->vars);
    }


    // Выход
    public function logoutAction()
    {
        unset($_SESSION['authorize']);
        $this->view->redirect('/only/account/login');
    }

}
