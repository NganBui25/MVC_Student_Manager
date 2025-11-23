<?php
// Thông tin kết nối cơ sở dữ liệu
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'dulieu_mvc');
define('DB_PORT', '3307'); // <--- 1. Thêm dòng này

// Tạo chuỗi DSN (Data Source Name)
// 2. Thêm ";port=" . DB_PORT vào chuỗi bên dưới
define('DSN', 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8');
?>