<?php 

namespace src\controllers;

use src\core\Controller;
use Valitron\Validator;


class AccountController extends Controller
{


    // Авторизация
    public function loginAction()
    {
        if (!empty($_POST)) {
            $result = $this->model->entryToApplication($_POST);
            if ($result) {
                if (require (__DIR__.'/../captcha/Сaptcha.php')) {
                    $this->view->redirect('/only/user/home');
                } else {
                    $this->errors = [['Проверка капчей не прошла!']];
                    $this->getErrors();
                }
            } else {
                    $this->errors = [['Введены неверные данные!']];
                    $this->getErrors();
                }
        }
        $this->view->render("Авторизация");
    }


    // Регистрация вместе с валидацией вводных данных
    public function registerAction()
    {
        if (!empty($_POST)) { 
            Validator::langDir(__DIR__ ."/../../vendor/vlucas/valitron/lang");
            Validator::lang('ru');
            $validator = new Validator($_POST);
            $validator->rules(require __DIR__.'/../config/rules.php');
            $validator->labels(require __DIR__.'/../config/labels.php');
            if ($validator->validate()) {
                if ($this->model->checkLoginExists($_POST)) { 
                    if ($this->model->checkEmailExist($_POST) && $this->model->checkPhoneExist($_POST)) { 
                        $this->model->addUserToBase($_POST);
                        $this->view->redirect('/only/account/login');
                    } else {
                        $this->errors = [['Пользователь с этой почтой или телефоном уже зарегистрирован!']];
                        $this->getErrors();
                        }
                } else {
                    $this->errors= [['Логин уже используется']];
                    $this->getErrors();
                }
            } else {
                $this->errors = $validator->errors();
                $this->getErrors();
                }
        }
        $this->view->render("Регистрация");
    }


    // Главная страница
    public function mainAction()
    {
        $this->view->render("Главная страница");
    }
}
