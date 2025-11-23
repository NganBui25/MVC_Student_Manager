<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh viên</title>
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
            border-bottom: 3px solid #27ae60;
        }
        .header h1 { 
            color: #2c3e50; 
            font-weight: 700; 
            font-size: 2rem;
        }
        .btn-success { background-color: #27ae60; border-color: #27ae60; }
        .btn-success:hover { background-color: #229954; border-color: #229954; }
        .btn-secondary { background-color: #95a5a6; border-color: #95a5a6; }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h1><i class="fas fa-user-plus text-success"></i> Thêm Sinh viên</h1>
        </div>

        <form method="POST" action="index.php?controller=student&action=store">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user me-2"></i>Họ và tên</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-birthday-cake me-2"></i>Tuổi</label>
                <input type="number" class="form-control" name="age" min="15" max="100" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label"><i class="fas fa-university me-2"></i>Trường đại học</label>
                <input type="text" class="form-control" name="university" required>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save me-2"></i>Thêm sinh viên
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Quay lại danh sách
                </a>
            </div>
        </form>
    </div>
</body>
</html>
