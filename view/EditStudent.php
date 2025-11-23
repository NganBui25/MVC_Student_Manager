<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px 0;
        }
        .form-container { 
            background: white; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            padding: 40px;
            max-width: 500px;
            margin: 0 auto;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
            padding-bottom: 20px;
            border-bottom: 3px solid #f39c12;
        }
        .header h1 { 
            color: #2c3e50; 
            font-weight: 700; 
            font-size: 2rem;
        }
        .btn-warning { background-color: #f39c12; border-color: #f39c12; }
        .btn-warning:hover { background-color: #e67e22; border-color: #e67e22; }
        .btn-secondary { background-color: #95a5a6; border-color: #95a5a6; }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h1><i class="fas fa-edit text-warning"></i> Sửa Sinh viên</h1>
        </div>

        <?php if ($student): ?>
        <form method="POST" action="index.php?controller=student&action=update">
            <input type="hidden" name="id" value="<?= htmlspecialchars($student->id) ?>">
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user me-2"></i>Họ và tên</label>
                <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($student->name) ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-birthday-cake me-2"></i>Tuổi</label>
                <input type="number" class="form-control" name="age" min="15" max="100" value="<?= htmlspecialchars($student->age) ?>" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label"><i class="fas fa-university me-2"></i>Trường đại học</label>
                <input type="text" class="form-control" name="university" value="<?= htmlspecialchars($student->university) ?>" required>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning btn-lg text-white">
                    <i class="fas fa-save me-2"></i>Cập nhật sinh viên
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                </a>
            </div>
        </form>
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
