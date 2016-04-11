<?php

namespace App\Index\Controllers;

class IndexController extends \App\Classes\Controller {

    public function indexAction($a = '') {
        $items = $this->database()->query('SELECT * FROM articles ORDER BY id DESC')->fetchAll(\PDO::FETCH_OBJ);
        $this->view()->assign('items', $items);
        $this->view()->display('index/index.php');
    }

    public function viewAction($id) {
        $article = $this->database()->prepare('SELECT * FROM articles WHERE id = ?');
        $article->bindParam(1, $id, \PDO::PARAM_INT);
        $article->execute();
        $Article = $article->fetch(\PDO::FETCH_OBJ);

        if ($Article) {
            $this->view()->assign(compact('Article'));
            $this->view()->display('index/view.php');
        }
    }

    public function contactAction() {
        $this->view()->display('index/contact.php');
    }

}
