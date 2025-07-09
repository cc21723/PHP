<?php
include_once "../api/db.php";

// 撈取所有已上傳的資料
$sql = "SELECT * FROM reserve ORDER BY uploaded_at DESC";
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="header d-flex justify-content-between align-items-center mb-4">
    <h3 style="color:#c44a7c;">預約時間圖管理</h3>
    <button class="btn btn-outline-primary" id="add-btn">➕ 新增圖片</button>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th width="120">照片</th>
            <th width="180">標題</th>
            <th>內容</th>
            <th width="100">顯示設定</th>
            <th width="150">操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td>
                    <img src="<?= $row['img']; ?>" alt="照片" style="width:100px; height:100px; object-fit:cover; border-radius:8px;">
                </td>
                <td><?= htmlspecialchars($row['title']); ?></td>
                <td><?= nl2br(htmlspecialchars($row['content'])); ?></td>
                <td>
                    <?= $row['sh'] ? '<span class="badge bg-success">顯示</span>' : '<span class="badge bg-secondary">不顯示</span>' ?>
                </td>
                <td>
                    <button class="btn btn-sm btn-warning me-1 edit-btn" data-id="<?= $row['id']; ?>">編輯</button>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $row['id']; ?>">刪除</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    // 新增圖片
    $('#add-btn').click(function() {
        $('#content-area').load('./modal/reserve.php');
    });

    // 編輯
    $('.edit-btn').click(function() {
        const id = $(this).data('id');
        $('#content-area').load(`./model/edit.php?id=${id}`);
    });

    // 刪除
    $('.delete-btn').click(function() {
        const id = $(this).data('id');
        if (confirm('確定要刪除這筆資料嗎？')) {
            $.post('./api/delete_service.php', {
                id
            }, function(res) {
                alert('刪除成功');
                $('#content-area').load('./serive.php');
            }).fail(function() {
                console.log(id);
                
                alert('刪除失敗，請稍後再試');
            });
        }
    });
</script>