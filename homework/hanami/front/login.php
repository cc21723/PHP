<?php
session_start();
include_once '../api/db.php';


$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['acc']);
    $password = $_POST['pw'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE acc = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    echo ($username);
    echo ($password);

    // if ($user && password_verify($password, $user['pw'])) {
    if ($user && $password === $user['pw']) {
        $_SESSION['admin'] = $user['id'];

        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "帳號或密碼錯誤";
    }
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>🔐 後台登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #fffafc, #ffeef3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        .login-box h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #c44a7c;
        }

        .login-box .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .login-box input {
            margin-bottom: 15px;
        }

        .login-box button {
            width: 100%;
            background: #d85c93;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .login-box button:hover {
            background: #c44a7c;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>🔐 後台登入</h2>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="acc" class="form-control" placeholder="帳號" required>
            <input type="password" name="pw" class="form-control" placeholder="密碼" required>
            <button type="submit">登入</button>
        </form>
    </div>
</body>

</html>