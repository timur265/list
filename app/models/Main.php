<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

    public function allTasks($start, $perpage, $order, $column) {
        $stmt = $this->con->prepare("SELECT * FROM ex_list ORDER BY $column $order LIMIT $start, $perpage");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function countTask() {
        $stmt = $this->con->prepare("SELECT * FROM ex_list ");
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }

    public function postAdd($post) {
        $name = htmlspecialchars($post['name']);
        $text = htmlspecialchars($post['text']);
        $email = htmlspecialchars($post['email']);
        $stmt = $this->con->prepare("INSERT INTO ex_list(name, text, email) VALUES(?, ?, ?)");
        $stmt->execute([$name, $text, $email]);
        return $this->con->lastInsertId();
    }



}