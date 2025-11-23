<?php
// File: model/M_Student.php - Model Student

require_once 'model/E_Student.php';

class M_Student {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(DSN, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối CSDL: " . $e->getMessage());
        }
    }

    // Lấy tất cả sinh viên
    public function getAllStudents() {
        $stmt = $this->pdo->prepare("SELECT * FROM sinhvien ORDER BY id");
        $stmt->execute();
        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = new E_Student($row['id'], $row['name'], $row['age'], $row['university']);
        }
        return $students;
    }

    // Tìm kiếm sinh viên theo nhiều tiêu chí
    public function searchStudents($keyword = '', $age = '') {
        $sql = "SELECT * FROM sinhvien WHERE 1=1";
        $params = [];
        
        if (!empty($keyword)) {
            $sql .= " AND (name LIKE :keyword OR university LIKE :keyword)";
            $params['keyword'] = '%' . $keyword . '%';
        }
        
        if (!empty($age) && is_numeric($age)) {
            $sql .= " AND age = :age";
            $params['age'] = $age;
        }
        
        $sql .= " ORDER BY id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = new E_Student($row['id'], $row['name'], $row['age'], $row['university']);
        }
        return $students;
    }

    // Tìm kiếm nâng cao với nhiều tiêu chí
    public function searchStudentsAdvanced($name = '', $university = '', $age = '', $ageFrom = '', $ageTo = '') {
        $sql = "SELECT * FROM sinhvien WHERE 1=1";
        $params = [];
        
        if (!empty($name)) {
            $sql .= " AND name LIKE :name";
            $params['name'] = '%' . $name . '%';
        }
        
        if (!empty($university)) {
            $sql .= " AND university LIKE :university";
            $params['university'] = '%' . $university . '%';
        }
        
        if (!empty($age) && is_numeric($age)) {
            $sql .= " AND age = :age";
            $params['age'] = $age;
        } else {
            // Nếu không chọn tuổi cụ thể, kiểm tra khoảng tuổi
            if (!empty($ageFrom) && is_numeric($ageFrom)) {
                $sql .= " AND age >= :ageFrom";
                $params['ageFrom'] = $ageFrom;
            }
            
            if (!empty($ageTo) && is_numeric($ageTo)) {
                $sql .= " AND age <= :ageTo";
                $params['ageTo'] = $ageTo;
            }
        }
        
        $sql .= " ORDER BY id DESC";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        
        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = new E_Student($row['id'], $row['name'], $row['age'], $row['university']);
        }
        
        return $students;
    }

    // Lấy sinh viên theo ID
    public function getStudentById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM sinhvien WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new E_Student($row['id'], $row['name'], $row['age'], $row['university']);
        }
        return null;
    }

    // Thêm sinh viên mới
    public function addStudent(E_Student $student) {
        $stmt = $this->pdo->prepare("INSERT INTO sinhvien (name, age, university) VALUES (:name, :age, :university)");
        $stmt->execute([
            'name' => $student->name,
            'age' => $student->age,
            'university' => $student->university
        ]);
        return $this->pdo->lastInsertId();
    }

    // Cập nhật thông tin sinh viên
    public function updateStudent(E_Student $student) {
        $stmt = $this->pdo->prepare("UPDATE sinhvien SET name = :name, age = :age, university = :university WHERE id = :id");
        return $stmt->execute([
            'id' => $student->id,
            'name' => $student->name,
            'age' => $student->age,
            'university' => $student->university
        ]);
    }

    // Xóa sinh viên
    public function deleteStudent($id) {
        $stmt = $this->pdo->prepare("DELETE FROM sinhvien WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
