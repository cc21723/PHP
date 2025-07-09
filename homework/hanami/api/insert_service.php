<?php
include_once "db.php";

if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $filename = "images/" . uniqid() . "_" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../" . $filename);  // 把圖片存到專案根目錄的 /images

    $sql = "INSERT INTO service (img, title, content, sh) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $filename, // 儲存相對於網站根目錄的路徑
        $_POST['title'],
        $_POST['description'],
        $_POST['visible']
    ]);

    echo "<script>
        alert('上傳成功！');
        window.location.href = '../dashboard.php';
    </script>";
    exit;
} else {
    echo "<script>
        alert('上傳失敗，請重新嘗試！');
        window.location.href = '../dashboard.php';
    </script>";
    exit;
}
