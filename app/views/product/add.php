<?php include 'app/views/shares/header.php'; ?>

<div class="form-shell">
    <div class="page-head">
        <div>
            <h1 class="page-title">Thêm sản phẩm</h1>
            <p class="page-subtitle">Nhập thông tin cơ bản để đưa sản phẩm mới vào cửa hàng.</p>
        </div>
    </div>

    <div class="surface surface-pad">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Giá</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="category_id">Danh mục</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->id ?>">
                                <?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="d-flex flex-wrap justify-content-between" style="gap: 10px;">
                <a href="/webbanhang/Product/list" class="btn btn-outline-secondary">Quay lại</a>
                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
