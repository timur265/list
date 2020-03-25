<?php

namespace app\controllers;

use app\core\Controller;
//use app\lib\Pagination;
use app\models\Main;

class AdminController extends Controller {

    private $error = '';

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	public function loginAction() {
	    if(!empty($_SESSION['admin'])) {
	        $this->view->redirect('/test/');
        }
		if (!empty($_POST)) {
			if ($this->model->loginValidate($_POST)) {
                $_SESSION['admin'] = 'Admin';
                $this->view->redirect('/test/');
            }else{
                $this->error = 'Логин или пароль указан неверно';
            }
		}
        $this->view->render(['error' => $this->error]);
	}

	public function logoutAction() {
	    unset($_SESSION['admin']);
	    $this->view->redirect();
    }


	public function editAction() {
	    if(!isset($_SESSION['admin'])) {
	        $this->view->redirect('/test/');
        }
	    $id = !empty($_GET['id']) ? $_GET['id'] : null;
		if (!empty($_POST)) {
		    $this->model->taskEdit($_POST, $id);
		    $_SESSION['update'] = 'Задача успешно обнавлена';
		    $_SESSION['edited_id'][$id] = $id;
		}
        $data = $this->model->taskData($id);
		$this->view->render(['data' => $data]);
	}

}