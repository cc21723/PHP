<?php
include_once './api/db.php';
include_once './api/auth.php'; // 驗證是否已登入

?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>後台管理 | 花見漫漫美學</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #fffafc, #ffeef3);
            font-family: 'Segoe UI', sans-serif;
        }

        .admin-container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 15%;
            min-width: 250px;
            background-color: #ffe0ec;
            padding: 2rem;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            color: #c44a7c;
            margin-bottom: 2rem;
        }

        .sidebar a.btn {
            background-color: #f8a6c0;
            color: #fff;
            margin-bottom: 1rem;
            /* text-align: left; */
            transition: 0.3s ease;
        }

        .sidebar a.btn:hover {
            background-color: #e36b97;
            transform: translateX(5px);
        }

        .logout {
            margin-top: auto;
            background-color: #dc3545;
            color: white;
        }

        .main-content {
            width: 70%;
            padding: 2rem;
            overflow-y: auto;
            margin: 0 auto;
        }

        .text-muted {
            font-weight: bold;
            color: #872657 !important;
        }

        #content-area {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            min-height: 60vh;
        }

        @media (max-width: 768px) {
            .admin-container {
                flex-direction: column;
            }

            .sidebar,
            .main-content {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="admin-container">
        <!-- 左側選單 -->
        <div class="sidebar">
            <h2>後台管理</h2>
            <a href="#" data-page="service.php" class="btn btn-lg w-100 nav-link">服務項目管理</a>
            <a href="#" data-page="portfolio.php" class="btn btn-lg w-100 nav-link">作品照片管理</a>
            <a href="#" data-page="studio.php" class="btn btn-lg w-100 nav-link">環境照片管理</a>
            <a href="#" data-page="reserve.php" class="btn btn-lg w-100 nav-link">預約時間圖管理</a>
            <a href="#" data-page="ig_link.php" class="btn btn-lg w-100 nav-link">IG連結管理</a>
            <a href="#" data-page="account.php" class="btn btn-lg w-100 nav-link">帳號管理</a>
            <a href="./backend/logout.php" class="btn logout btn-m w-100 mt-3">登出</a>
        </div>

        <!-- 右側內容區 -->
        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>請點選左側功能進行管理</h3>
                <div class="text-muted">👤 管理員：<?php echo $_SESSION['user'] ?? '未登入'; ?></div>
            </div>
            <div id="content-area">
                歡迎使用花見漫漫美學後台系統。
            </div>

        </div>

    </div>

    <script>
        $(function() {
            $('.nav-link').click(function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                $('#content-area').html('<div class="text-center py-5">讀取中...</div>');
                $.get(page, function(data) {
                    $('#content-area').html(data);
                }).fail(function() {
                    $('#content-area').html('<div class="text-danger">載入失敗，請稍後再試。</div>');
                });
            });
        });

         // 頁面載入時預設顯示 serive.php
        $('#content-area').load('./backend/service.php');

        $(function() {
            $('.sidebar .btn').not('.logout').on('click', function() {
                const page = $(this).data('page');
                $('#content-area').load(`./backend/${page}`);
            });
        });
    </script>

</body>

</html>