<?php

namespace app\models;

use app\core\Model;


class Admin extends Model {


	public function loginValidate($post) {
		$config = require 'app/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			return false;
		}
		return true;
	}

	public function taskEdit($post, $id) {
		$stmt = $this->con->prepare('UPDATE ex_list SET name = ?, status = ?, text = ?, email = ? WHERE id = ?');
		$stmt->execute(array($post['name'], $post['status'], $post['text'], $post['email'], $id));

	}

    public function taskData($id) {
	    $stmt = $this->con->prepare('SELECT * FROM ex_list WHERE id = ?');
	    $stmt->execute([$id]);
        return $stmt->fetch();
    }
}