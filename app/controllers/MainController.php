<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Pagination;

class MainController extends Controller {

    public function indexAction() {
        $title = "Main";
        $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
        $column = isset($_GET['column']) ? $_GET['column'] : 'id';
        $total = $this->model->countTask();
        $perpage = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $rows = $this->model->allTasks($start, $perpage, $order, $column);
        $this->view->render(['title' => $title, 'tasks' => $rows, 'pagination' => $pagination, 'order' => $order]);
    }

    public function addAction() {
        if (!empty($_POST)) {
            $id = $this->model->postAdd($_POST);
            $_SESSION['task'] = 'Задача успешно добавлена';
            $this->view->render($id);
        }
        $this->view->redirect();
    }
}