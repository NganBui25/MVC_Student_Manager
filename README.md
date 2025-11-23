-Hướng dẫn tạo database
    -- Tạo database dulieu_mvc
    CREATE DATABASE IF NOT EXISTS dulieu_mvc 
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;
    
    USE dulieu_mvc;
    
    -- Tạo bảng sinhvien theo đúng cấu trúc
    CREATE TABLE sinhvien (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        age INT NOT NULL,
        university VARCHAR(100) NOT NULL
    );
    
    -- Thêm dữ liệu mẫu
    INSERT INTO sinhvien (id, name, age, university) VALUES 
    (1, 'Lê A', 20, 'FPT'),
    (2, 'Trần B', 19, 'DHBK'),
    (3, 'Mạc C', 22, 'SPKT');

-File database cần đổi cổng tương ứng với xampp của bạn
