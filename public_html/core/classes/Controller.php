<?php

namespace App\Classes;

use App\Template;
use App\Database;

abstract class Controller {

    protected $_view;
    protected $_database;
    protected $_validation;

    public function __construct() {
        
    }

    public function view() {
        if (!isset($this->_view)) {
            $reflection = new \ReflectionClass($this);
            $this->_view = Template::create($this)
                    ->setBasePath(dirname(dirname($reflection->getFileName())) . "/views/");
        }
        return $this->_view;
    }

    public function database() {
        if (!isset($this->_database)) {
            $this->_database = Database::getInstance();
        }

        return $this->_database;
    }


}
