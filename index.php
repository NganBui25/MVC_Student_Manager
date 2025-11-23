<?php
// File: index.php (Front Controller)

// Nạp file cấu hình
require_once 'config/database.php';

// --- SỬA Ở ĐÂY ---
// 1. Mặc định là C_Students (có 's') vì file của bạn tên là C_Students.php
$controllerName = isset($_GET['controller']) ? 'C_' . ucfirst($_GET['controller']) : 'C_Student';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// --- SỬA Ở ĐÂY ---
// 2. Folder của bạn tên là 'controller' (không có 's')
$controllerFile = 'controller/' . $controllerName . '.php';

// Kiểm tra file controller có tồn tại không
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Kiểm tra class controller có tồn tại không
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        // Kiểm tra phương thức (action)
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            echo "Lỗi: Action '$actionName' không tồn tại trong class '$controllerName'!";
        }
    } else {
        echo "Lỗi: Class '$controllerName' không tồn tại trong file!";
    }
} else {
    echo "Lỗi: File controller '$controllerFile' không tồn tại! <br>";
    echo "Gợi ý: Kiểm tra lại tên file hoặc đường dẫn thư mục.";
}
?>