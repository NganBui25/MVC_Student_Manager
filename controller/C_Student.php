<?php
// File: controller/C_Student.php

// 1. Sửa đường dẫn folder thành số ít 'model' cho đúng cấu trúc thư mục
require_once 'model/M_Student.php';
// 2. Thêm dòng này để hiểu E_Student là gì
require_once 'model/E_Student.php'; 

class C_Student {
    private $model;

    public function __construct() {
        $this->model = new M_Student();
    }

    // Hiển thị danh sách sinh viên
    public function index() {
        $keyword = $_GET['keyword'] ?? '';
        $age = $_GET['age'] ?? '';
        
        if ($keyword || $age) {
            $students = $this->model->searchStudents($keyword, $age);
        } else {
            $students = $this->model->getAllStudents();
        }
        // 3. Sửa 'views' -> 'view' và '.html' -> '.php'
        include 'view/StudentList.php'; 
    }

    // Hiển thị trang tìm kiếm
    public function search() {
        $name = $_GET['name'] ?? '';
        $university = $_GET['university'] ?? '';
        $age = $_GET['age'] ?? '';
        $ageFrom = $_GET['age_from'] ?? '';
        $ageTo = $_GET['age_to'] ?? '';
        
        if ($name || $university || $age || $ageFrom || $ageTo) {
            $students = $this->model->searchStudentsAdvanced($name, $university, $age, $ageFrom, $ageTo);
        }
        include 'view/SearchStudent.php'; // Sửa đuôi file
    }

    // Hiển thị chi tiết sinh viên
    public function detail() {
        $id = $_GET['id'] ?? 0;
        $student = $this->model->getStudentById($id);
        // Đây chính là file bạn vừa sửa code xong
        include 'view/StudentDetail.php'; 
    }

    // Hiển thị form thêm sinh viên
    public function add() {
        include 'view/AddStudent.php'; // Sửa đuôi file
    }

    // Xử lý thêm sinh viên
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Cần require E_Student ở đầu file mới dùng được dòng dưới
            $student = new E_Student(null, $_POST['name'], $_POST['age'], $_POST['university']);
            $this->model->addStudent($student);
            header('Location: index.php?success=add');
            exit;
        }
    }

    // Hiển thị form sửa sinh viên
    public function edit() {
        $id = $_GET['id'] ?? 0;
        $student = $this->model->getStudentById($id);
        include 'view/EditStudent.php'; // Sửa đuôi file
    }

    // Xử lý cập nhật sinh viên
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student = new E_Student($_POST['id'], $_POST['name'], $_POST['age'], $_POST['university']);
            $this->model->updateStudent($student);
            header('Location: index.php?success=update');
            exit;
        }
    }

    // Xóa sinh viên
    public function delete() {
        $id = $_GET['id'] ?? 0;
        $student = $this->model->getStudentById($id);
        include 'view/DeleteStudent.php'; // Sửa đuôi file
    }

    // Xác nhận xóa sinh viên
    public function confirmDelete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $this->model->deleteStudent($id);
            header('Location: index.php?success=delete');
            exit;
        }
    }
}
?>