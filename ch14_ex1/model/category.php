<?php
class Category {
    private $id;
    private $name;

    //constructor accepting no parameters
    public function __construct() {
        $id = NULL;
        $name = NULL;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}
?>