<?php
// File: model/E_Student.php - Entity Student

class E_Student {
    public $id;
    public $name;
    public $age;
    public $university;

    public function __construct($id = null, $name = null, $age = null, $university = null) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->university = $university;
    }
}
?>
