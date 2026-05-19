<?php include __DIR__ . '/../shares/header.php'; ?>

<h1>Sửa sản phẩm</h1>

<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
    <input type="hidden" name="id" value="<?= $product->id ?>">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control"
               value="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required><?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01"
               value="<?= htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') ?>" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" id="image" name="image" class="form-control">
        <!--  Đúng tên, nằm trong form -->
        <input type="hidden" name="existing_image" value="<?= $product->image ?>">
        <?php if ($product->image): ?>
            <img src="/<?= $product->image ?>" alt="Product Image" style="max-width: 100px; margin-top: 8px;">
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    <a href="/webbanhang/Product" class="btn btn-secondary mt-2">Quay lại danh sách</a>
</form>

<?php include __DIR__ . '/../shares/footer.php'; ?>