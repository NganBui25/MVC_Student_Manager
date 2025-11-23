<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh; 
            padding: 20px 0;
        }
        .container { 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.2); 
            padding: 40px; 
            max-width: 600px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            color: white;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }
        .detail-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: bold;
            color: #495057;
            display: flex;
            align-items: center;
        }
        .detail-label i {
            margin-right: 8px;
            width: 20px;
        }
        .detail-value {
            font-size: 16px;
            color: #212529;
        }
        .badge-custom {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }
        .btn-custom {
            margin: 5px;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($student): ?>
        <div class="profile-header">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <h3><?= htmlspecialchars($student->name) ?></h3>
            <p class="mb-0">Sinh viên ID: #<?= htmlspecialchars($student->id) ?></p>
        </div>

        <div class="detail-card">
            <h5 class="mb-3"><i class="fas fa-info-circle"></i> Thông tin chi tiết</h5>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-hashtag text-primary"></i>
                    Mã số sinh viên
                </div>
                <div class="detail-value">
                    <span class="badge bg-primary badge-custom">#<?= htmlspecialchars($student->id) ?></span>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-user text-success"></i>
                    Họ và tên
                </div>
                <div class="detail-value">
                    <strong><?= htmlspecialchars($student->name) ?></strong>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-birthday-cake text-warning"></i>
                    Tuổi
                </div>
                <div class="detail-value">
                    <span class="badge bg-warning text-dark badge-custom"><?= htmlspecialchars($student->age) ?> tuổi</span>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">
                    <i class="fas fa-university text-info"></i>
                    Trường đại học
                </div>
                <div class="detail-value">
                    <span class="badge bg-info badge-custom"><?= htmlspecialchars($student->university) ?></span>
                </div>
            </div>
        </div>

        <div class="action-buttons">
            <a href="index.php?controller=student&action=edit&id=<?= $student->id ?>" class="btn btn-warning btn-custom">
                <i class="fas fa-edit"></i> Chỉnh sửa thông tin
            </a>
            <a href="index.php?controller=student&action=delete&id=<?= $student->id ?>" 
               class="btn btn-danger btn-custom">
                <i class="fas fa-trash"></i> Xóa sinh viên
            </a>
            <a href="index.php" class="btn btn-secondary btn-custom">
                <i class="fas fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>

        <?php else: ?>
        <div class="text-center">
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Không tìm thấy sinh viên</h3>
                <p class="mb-0">Sinh viên không tồn tại hoặc đã bị xóa</p>
            </div>
            
            <div class="action-buttons">
                <a href="index.php" class="btn btn-primary btn-custom">
                    <i class="fas fa-arrow-left"></i> Quay lại danh sách
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
