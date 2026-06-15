<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="mb-3">
    <a href="/webbanhang/product" class="text-muted">Sản phẩm</a>
    <span class="text-muted mx-2">/</span>
    <span><?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?></span>
</div>

<div class="surface surface-pad">
    <div class="row">
        <div class="col-md-5 mb-4 mb-md-0">
            <?php if (!empty($product->image)): ?>
                <img
                    src="/webbanhang/<?= htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>"
                    class="img-fluid"
                    style="border-radius: 8px; width: 100%; object-fit: cover;"
                >
            <?php else: ?>
                <div class="product-placeholder" style="border-radius: 8px;">Chưa có ảnh</div>
            <?php endif; ?>
        </div>

        <div class="col-md-7">
            <span class="badge-soft">
                <?= htmlspecialchars($product->category_name ?? 'Chưa phân loại', ENT_QUOTES, 'UTF-8') ?>
            </span>

            <h1 class="page-title mt-3">
                <?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>
            </h1>

            <p class="text-muted">
                <?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <div class="price-text mb-4">
                <?= number_format($product->price, 0, ',', '.') ?> VND
            </div>

            <div class="d-flex flex-wrap" style="gap: 10px;">
                <?php if (SessionHelper::isAdmin()): ?>
                    <a href="/webbanhang/product/edit/<?= $product->id ?>" class="btn btn-warning">Sửa</a>
                    <a
                        href="/webbanhang/product/delete/<?= $product->id ?>"
                        class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                    >
                        Xóa
                    </a>
                <?php endif; ?>

                <a href="/webbanhang/Product/addToCart/<?= $product->id ?>" class="btn btn-primary">
                    Thêm vào giỏ
                </a>
                <a href="/webbanhang/product" class="btn btn-outline-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
