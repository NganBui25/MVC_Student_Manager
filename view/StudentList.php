<!DOCTYPE html>
<html lang="vi">
<hea        
        /* Main table section - prominent */rset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .main-container { 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.08); 
            margin: 20px auto; 
            padding: 30px;
            max-width: 1300px;
        }
        .header { 
            text-align: center; 
            margin-bottom: 25px; 
            padding-bottom: 15px;
            border-bottom: 2px solid #dee2e6;
        }
        .header h1 { 
            color: #495057; 
            font-weight: 600; 
            font-size: 2rem;
            margin-bottom: 5px;
        }
        .header p {
            color: #6c757d;
            font-size: 0.9rem;
            margin: 0;
        }
        
        /* Compact search section */
        .search-section { 
            background: #f8f9fa; 
            border-radius: 10px; 
            padding: 15px; 
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .search-section h6 {
            color: #495057;
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        /* Compact search section */
        .search-section { 
            background: #f8f9fa; 
            border-radius: 10px; 
            padding: 15px; 
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
        }
        .search-section h6 {
            color: #495057;
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        /* Search form styling */
        .search-form {
            background: white;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
        }
        
        .search-form .form-control, .search-form .form-select {
            font-size: 0.85rem;
            padding: 6px 10px;
        }
        
        .search-form .btn {
            font-size: 0.8rem;
            padding: 6px 12px;
        }
        
        /* Action bar */
        .action-bar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 15px;
            padding: 15px 0;
        }
        .action-bar h6 {
            color: #495057;
            margin: 0;
            font-size: 0.95rem;
        }
        
        /* Main table section - prominent */
        .table-section { 
            background: white; 
            border-radius: 12px; 
            overflow: hidden; 
            box-shadow: 0 3px 12px rgba(0,0,0,0.1);
            border: 1px solid #dee2e6;
        }
        
        .table th {
            background: #495057 !important;
            color: white;
            font-weight: 500;
            text-align: center;
            padding: 15px 8px;
            border: none;
            font-size: 0.9rem;
        }
        
        .table td {
            text-align: center;
            padding: 12px 8px;
            vertical-align: middle;
            border-color: #dee2e6;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            /* Removed transform effect */
        }
        
        /* Buttons */
        .btn-primary { background-color: #0d6efd; border-color: #0d6efd; }
        .btn-success { background-color: #198754; border-color: #198754; }
        .btn-info { background-color: #0dcaf0; border-color: #0dcaf0; color: #000; }
        .btn-warning { background-color: #ffc107; border-color: #ffc107; color: #000; }
        .btn-danger { background-color: #dc3545; border-color: #dc3545; }
        
        .btn-action { 
            margin: 1px; 
            font-size: 0.8rem;
            padding: 4px 8px;
        }
        
        /* Alert styling */
        .alert { 
            border-radius: 8px; 
            padding: 10px 15px;
            margin-bottom: 15px;
        }
        
        /* Badge styling */
        .badge {
            font-size: 0.8rem;
            padding: 4px 8px;
        }
        
        /* Compact footer */
        .stats-section {
            background: #6c757d;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 0.85rem;
        }
        
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Compact Header -->
        <div class="header">
            <h1><i class="fas fa-users me-2"></i>Danh sách Sinh viên</h1>
            <p>Hệ thống quản lý sinh viên</p>
        </div>

        <!-- Success Messages -->
        <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            <?php
            switch($_GET['success']) {
                case 'add': echo 'Thêm sinh viên thành công!'; break;
                case 'update': echo 'Cập nhật sinh viên thành công!'; break;
                case 'delete': echo 'Xóa sinh viên thành công!'; break;
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <!-- Compact Search Section -->
        <div class="search-section">
            <h6><i class="fas fa-search me-1"></i>Tìm kiếm nhanh</h6>
            <div class="search-form">
                <form method="GET">
                    <input type="hidden" name="controller" value="student">
                    <input type="hidden" name="action" value="index">
                    
                    <div class="row g-2">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="keyword" 
                                   placeholder="Tìm theo tên hoặc trường..." 
                                   value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="age">
                                <option value="">Chọn tuổi</option>
                                <?php for($i = 15; $i <= 100; $i++): ?>
                                <option value="<?= $i ?>" <?= ($_GET['age'] ?? '') == $i ? 'selected' : '' ?>>
                                    <?= $i ?> tuổi
                                </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Tìm
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="fas fa-refresh"></i> Reset
                            </a>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="index.php?controller=student&action=add" class="btn btn-success">
                                <i class="fas fa-plus"></i> Thêm
                            </a>
                        </div>
                    </div>
                    
                    <div class="text-center mt-2">
                        <a href="index.php?controller=student&action=search" class="btn btn-link btn-sm">
                            <i class="fas fa-cog me-1"></i>Tìm kiếm nâng cao
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="action-bar">
            <h6 class="text-muted mb-0">
                <i class="fas fa-list me-1"></i>Hiển thị <strong><?= count($students ?? []) ?></strong> sinh viên
                <?php if (!empty($_GET['keyword']) || !empty($_GET['age'])): ?>
                <span class="badge bg-info ms-2">Đã lọc</span>
                <?php endif; ?>
            </h6>
        </div>

        <!-- Main Student List Table -->
        <div class="table-section">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 8%">ID</th>
                            <th style="width: 30%">Họ và Tên</th>
                            <th style="width: 12%">Tuổi</th>
                            <th style="width: 25%">Trường ĐH</th>
                            <th style="width: 25%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-search-minus fa-2x text-muted mb-2"></i>
                                <p class="text-muted mb-0">Không tìm thấy sinh viên nào!</p>
                                <a href="index.php" class="btn btn-outline-primary btn-sm mt-2">Xem tất cả</a>
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach ($students as $index => $student): ?>
                        <tr <?= $index % 2 == 0 ? '' : 'class="table-light"' ?>>
                            <td><span class="badge bg-primary"><?= htmlspecialchars($student->id) ?></span></td>
                            <td><strong><?= htmlspecialchars($student->name) ?></strong></td>
                            <td><?= htmlspecialchars($student->age) ?> tuổi</td>
                            <td><span class="badge bg-info"><?= htmlspecialchars($student->university) ?></span></td>
                            <td>
                                <a href="index.php?controller=student&action=detail&id=<?= $student->id ?>" 
                                   class="btn btn-info btn-sm btn-action" title="Chi tiết">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?controller=student&action=edit&id=<?= $student->id ?>" 
                                   class="btn btn-warning btn-sm btn-action" title="Sửa">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?controller=student&action=delete&id=<?= $student->id ?>" 
                                   class="btn btn-danger btn-sm btn-action" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Compact Footer Stats -->
        <div class="stats-section">
            <i class="fas fa-info-circle me-1"></i>
            Tổng cộng: <strong><?= count($students ?? []) ?></strong> sinh viên
            <?php if (!empty($students)): ?>
            | Trường: <strong><?= count(array_unique(array_column($students, 'university'))) ?></strong>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
