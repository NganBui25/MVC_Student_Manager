<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 0;
        }
        .confirm-container { 
            background: white; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            padding: 40px;
            max-width: 500px;
            margin: 0 auto;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
            padding-bottom: 20px;
            border-bottom: 3px solid #e74c3c;
        }
        .header h1 { 
            color: #e74c3c; 
            font-weight: 700; 
            font-size: 2rem;
        }
        .student-info {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
            border-left: 5px solid #e74c3c;
        }
        .student-info h5 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .info-item:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 500;
            color: #6c757d;
        }
        .info-value {
            font-weight: 600;
            color: #2c3e50;
        }
        .warning-text {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            color: #856404;
        }
        .btn-danger { background-color: #e74c3c; border-color: #e74c3c; }
        .btn-danger:hover { background-color: #c0392b; border-color: #c0392b; }
        .btn-secondary { background-color: #95a5a6; border-color: #95a5a6; }
    </style>
</head>
<body>
    <div class="confirm-container">
        <div class="header">
            <h1><i class="fas fa-trash-alt text-danger"></i> Xóa Sinh viên</h1>
        </div>

        <?php if ($student): ?>
        <div class="student-info">
            <h5><i class="fas fa-user-circle me-2"></i>Thông tin sinh viên sẽ bị xóa:</h5>
            <div class="info-item">
                <span class="info-label"><i class="fas fa-id-badge me-2"></i>Mã sinh viên:</span>
                <span class="info-value">#<?= htmlspecialchars($student->id) ?></span>
            </div>
            <div class="info-item">
                <span class="info-label"><i class="fas fa-user me-2"></i>Họ và tên:</span>
                <span class="info-value"><?= htmlspecialchars($student->name) ?></span>
            </div>
            <div class="info-item">
                <span class="info-label"><i class="fas fa-birthday-cake me-2"></i>Tuổi:</span>
                <span class="info-value"><?= htmlspecialchars($student->age) ?> tuổi</span>
            </div>
            <div class="info-item">
                <span class="info-label"><i class="fas fa-university me-2"></i>Trường:</span>
                <span class="info-value"><?= htmlspecialchars($student->university) ?></span>
            </div>
        </div>

        <div class="warning-text">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Cảnh báo:</strong> Hành động này không thể hoàn tác!
        </div>

        <div class="d-grid gap-2">
            <form method="POST" action="index.php?controller=student&action=confirmDelete" style="display: inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($student->id) ?>">
                <button type="submit" class="btn btn-danger btn-lg w-100">
                    <i class="fas fa-trash-alt me-2"></i>Xác nhận xóa sinh viên
                </button>
            </form>
            <a href="index.php" class="btn btn-secondary btn-lg">
                <i class="fas fa-arrow-left me-2"></i>Hủy bỏ - Quay lại danh sách
            </a>
        </div>
        <?php else: ?>
        <div class="text-center">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>Không tìm thấy sinh viên!
            </div>
            <a href="index.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
            </a>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
