<?php 

namespace src\core;

use src\core\View;
use Valitron\Validator;


class Controller
{
    public array $route;
    public View $view;
    public $model;
    public array $acl;
    public array $errors = [];
    

    public function __construct(array $route) 
    {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::redirect('/only/account/main');
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']); 
    }


    public function loadModel(string $name)
    {
        $path = 'src\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }


    public function checkAcl() : bool
    {
        $this->acl = require (__DIR__. '/../config/acl.php');
        if ($this->isAcl('all')) {
            return true;
        } elseif (isset($_SESSION['authorize'])) { 
            return true;
        }
        return false;
    }

    
    public function isAcl(string $key) : bool
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }

    public function getErrors()
    {
        $errors = '<ul>';
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['errors'] = $errors;
    }
}
