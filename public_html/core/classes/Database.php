<?php

namespace App;

class Database extends \PDO {

    private static $_instance = NULL;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=blog;';
        parent::__construct($dsn, 'root', '');

        return $this;
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

}
