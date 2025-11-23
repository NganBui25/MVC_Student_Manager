<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px 0;
        }
        .search-container { 
            background: white; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px; 
            padding-bottom: 20px;
            border-bottom: 3px solid #3498db;
        }
        .header h1 { 
            color: #2c3e50; 
            font-weight: 700; 
            font-size: 2.2rem;
        }
        .search-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            border: 2px solid #e9ecef;
        }
        .search-section h5 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        .btn-primary { 
            background-color: #3498db; 
            border-color: #3498db; 
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 10px;
        }
        .btn-primary:hover { 
            background-color: #2980b9; 
            border-color: #2980b9; 
        }
        .btn-outline-secondary {
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
        }
        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
            border-radius: 10px;
            padding: 12px 25px;
            font-weight: 600;
        }
        .results-section {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: 1px solid #dee2e6;
        }
        .table th {
            background: #34495e !important;
            color: white;
            font-weight: 500;
            text-align: center;
            padding: 15px 10px;
            border: none;
        }
        .table td {
            text-align: center;
            padding: 12px 10px;
            vertical-align: middle;
            border-color: #dee2e6;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-action { 
            margin: 1px; 
            font-size: 0.8rem;
            padding: 4px 8px;
        }
        .search-stats {
            background: #e8f4fd;
            border: 1px solid #b3d9ff;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            color: #2c5aa0;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <div class="header">
            <h1><i class="fas fa-search me-3"></i>Tìm kiếm Sinh viên</h1>
            <p class="text-muted mb-0">Sử dụng các bộ lọc bên dưới để tìm kiếm sinh viên</p>
        </div>

        <!-- Form tìm kiếm -->
        <div class="search-section">
            <h5><i class="fas fa-filter me-2"></i>Bộ lọc tìm kiếm</h5>
            <form method="GET" action="index.php">
                <input type="hidden" name="controller" value="student">
                <input type="hidden" name="action" value="search">
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-user me-2"></i>Tìm theo tên</label>
                        <input type="text" class="form-control" name="name" 
                               placeholder="Nhập tên sinh viên..." 
                               value="<?= htmlspecialchars($_GET['name'] ?? '') ?>">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label"><i class="fas fa-university me-2"></i>Tìm theo trường</label>
                        <input type="text" class="form-control" name="university" 
                               placeholder="Nhập tên trường..." 
                               value="<?= htmlspecialchars($_GET['university'] ?? '') ?>">
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label"><i class="fas fa-birthday-cake me-2"></i>Tuổi cụ thể</label>
                        <select class="form-select" name="age">
                            <option value="">Chọn tuổi</option>
                            <?php for($i = 15; $i <= 100; $i++): ?>
                            <option value="<?= $i ?>" <?= ($_GET['age'] ?? '') == $i ? 'selected' : '' ?>>
                                <?= $i ?> tuổi
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label"><i class="fas fa-sort-numeric-up me-2"></i>Tuổi từ</label>
                        <select class="form-select" name="age_from">
                            <option value="">Từ tuổi</option>
                            <?php for($i = 15; $i <= 100; $i++): ?>
                            <option value="<?= $i ?>" <?= ($_GET['age_from'] ?? '') == $i ? 'selected' : '' ?>>
                                Từ <?= $i ?> tuổi
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label"><i class="fas fa-sort-numeric-down me-2"></i>Tuổi đến</label>
                        <select class="form-select" name="age_to">
                            <option value="">Đến tuổi</option>
                            <?php for($i = 15; $i <= 100; $i++): ?>
                            <option value="<?= $i ?>" <?= ($_GET['age_to'] ?? '') == $i ? 'selected' : '' ?>>
                                Đến <?= $i ?> tuổi
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                
                <div class="d-flex gap-2 justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Tìm kiếm ngay
                    </button>
                    <a href="index.php?controller=student&action=search" class="btn btn-outline-secondary">
                        <i class="fas fa-refresh me-2"></i>Làm mới
                    </a>
                    <a href="index.php" class="btn btn-success">
                        <i class="fas fa-list me-2"></i>Xem tất cả
                    </a>
                </div>
            </form>
        </div>

        <!-- Kết quả tìm kiếm -->
        <?php if (isset($students)): ?>
        <div class="search-stats">
            <i class="fas fa-info-circle me-2"></i>
            <strong>Kết quả:</strong> Tìm thấy <strong><?= count($students) ?></strong> sinh viên
            <?php if (!empty($_GET['name']) || !empty($_GET['university']) || !empty($_GET['age']) || !empty($_GET['age_from']) || !empty($_GET['age_to'])): ?>
            phù hợp với tiêu chí tìm kiếm
            <?php endif; ?>
        </div>

        <div class="results-section">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 10%">ID</th>
                            <th style="width: 30%">Họ và Tên</th>
                            <th style="width: 15%">Tuổi</th>
                            <th style="width: 25%">Trường ĐH</th>
                            <th style="width: 20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <i class="fas fa-search-minus fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Không tìm thấy sinh viên nào phù hợp!</p>
                                <small class="text-muted">Hãy thử thay đổi tiêu chí tìm kiếm</small>
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
                                   class="btn btn-danger btn-sm btn-action" title="Xóa"
                                   onclick="return confirm('Xóa sinh viên <?= htmlspecialchars($student->name) ?>?')">
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
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
