<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="form-shell">
    <div class="page-head">
        <div>
            <h1 class="page-title">Sửa sản phẩm</h1>
            <p class="page-subtitle">Cập nhật thông tin hiển thị và phân loại của sản phẩm.</p>
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

        <form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
            <input type="hidden" name="id" value="<?= $product->id ?>">

            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description" class="form-control" rows="4" required><?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Giá</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        class="form-control"
                        step="0.01"
                        value="<?= htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') ?>"
                        required
                    >
                </div>

                <div class="form-group col-md-6">
                    <label for="category_id">Danh mục</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" id="image" name="image" class="form-control">
                <input type="hidden" name="existing_image" value="<?= htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8') ?>">

                <?php if ($product->image): ?>
                    <img
                        src="/<?= htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8') ?>"
                        alt="Ảnh sản phẩm"
                        class="mt-3"
                        style="max-width: 120px; border-radius: 8px;"
                    >
                <?php endif; ?>
            </div>

            <div class="d-flex flex-wrap justify-content-between" style="gap: 10px;">
                <a href="/webbanhang/Product" class="btn btn-outline-secondary">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
