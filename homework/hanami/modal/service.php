
<h3 class="mb-4" style="color:#c44a7c;">服務項目管理</h3>

<form action="./api/insert_service.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="image" class="form-label">上傳照片</label>
    <input type="file" class="form-control" name="image" id="image" required>
  </div>

  <div class="mb-3">
    <label for="title" class="form-label">照片標題</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="請輸入標題" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">照片內容</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="請輸入簡介" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label d-block">顯示設定</label>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="visible" id="show" value="1" checked>
      <label class="form-check-label" for="show">顯示</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="visible" id="hide" value="0">
      <label class="form-check-label" for="hide">不顯示</label>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">上傳服務項目圖片</button>
</form>
