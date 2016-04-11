<?php

namespace App\Index\Controllers;

class ManageController extends \App\Classes\Controller {

    public function indexAction() {
        
    }

    public function createAction() {
        if (!empty($_POST)) {
            $errors = [];
            $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : false;
            $text = !empty($_POST['text']) ? htmlspecialchars($_POST['text']) : false;

            if (!$name || !$text) {
                $errors[] = 'Заполните все поля';
                $this->view()->assign('errors', $errors);
            } else {
                $query = $this->database()->prepare('INSERT INTO articles SET text = :text, name = :name, date = NOW()');
                $query->bindParam(':name', $name, \PDO::PARAM_STR);
                $query->bindParam(':text', $text, \PDO::PARAM_STR);

                if ($query->execute()) {
                    $uploadFileInfo = pathinfo($_FILES['image']['name']);
                    $uploadFile = rand(1000, 99999) . '.' . $uploadFileInfo['extension'];

                    if (isImage($_FILES['image']['type']) && move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR . '/' . $uploadFile)) {
                        $img = new \abeautifulsite\SimpleImage(UPLOAD_DIR . '/' . $uploadFile);
                        $img->best_fit(900, 300)
                                ->save(UPLOAD_DIR . '/' . $uploadFile);

                        $articleId = $this->database()->lastInsertId();

                        $update = $this->database()->prepare('UPDATE articles SET image = :image WHERE id = :id');
                        $update->bindParam(':image', $uploadFile);
                        $update->bindParam(':id', $articleId);
                        $update->execute();
                    }

                    location303('/');
                }
            }
        }

        $this->view()->display('manage/create.php');
    }

    public function deleteAction($id) {
        $article = $this->database()->prepare('SELECT * FROM articles WHERE id = ?');
        $article->bindParam(1, $id, \PDO::PARAM_INT);
        $article->execute();
        $row = $article->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            $this->database()->query('DELETE FROM articles WHERE id = ' . $row['id']);
            if (!empty($row['image']) && file_exists(UPLOAD_DIR . '/' . $row['image'])) {
                unlink(UPLOAD_DIR . '/' . $row['image']);
            }
        }

        location302('/');
    }

    public function editAction($id) {
        $article = $this->database()->prepare('SELECT * FROM articles WHERE id = ?');
        $article->bindParam(1, $id, \PDO::PARAM_INT);
        $article->execute();
        $row = $article->fetch(\PDO::FETCH_ASSOC);

        if (!$row) {
            location302('/');
        }
        $errors = [];

        if (!empty($_POST)) {
            $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : false;
            $text = !empty($_POST['text']) ? htmlspecialchars($_POST['text']) : false;

            if (!$name || !$text) {
                $errors[] = 'Заполните все поля';
            } else {
                $query = $this->database()->prepare('UPDATE articles SET text = :text, name = :name, date = NOW() WHERE id = ' . $row['id']);
                $query->bindParam(':name', $name, \PDO::PARAM_STR);
                $query->bindParam(':text', $text, \PDO::PARAM_STR);

                if ($query->execute()) {
                    location303('/');
                }
            }
        }

        $this->view()->assign(compact('row', 'errors'));
        $this->view()->display('manage/edit.php');
    }

}
