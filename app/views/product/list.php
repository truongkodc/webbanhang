<?php include __DIR__ . '/../shares/header.php'; ?>

<div class="page-head">
    <div>
        <h1 class="page-title">Sản phẩm</h1>
        <p class="page-subtitle">Xem nhanh thông tin, giá bán và danh mục của từng sản phẩm.</p>
    </div>

    <?php if (SessionHelper::isAdmin()): ?>
        <a href="/webbanhang/Product/add" class="btn btn-primary">Thêm sản phẩm mới</a>
    <?php endif; ?>
</div>

<?php if (!empty($products)): ?>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <article class="product-card h-100 d-flex flex-column">
                    <?php if ($product->image): ?>
                        <img
                            src="/webbanhang/<?= htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>"
                            class="product-media"
                        >
                    <?php else: ?>
                        <div class="product-placeholder">Chưa có ảnh</div>
                    <?php endif; ?>

                    <div class="p-3 d-flex flex-column flex-grow-1">
                        <div class="mb-2">
                            <span class="badge-soft">
                                <?= htmlspecialchars($product->category_name ?? 'Chưa phân loại', ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        </div>

                        <h2 class="h5 mb-2">
                            <a href="/webbanhang/Product/show/<?= $product->id ?>">
                                <?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </h2>

                        <p class="text-muted small flex-grow-1">
                            <?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?>
                        </p>

                        <div class="price-text mb-3">
                            <?= number_format($product->price, 0, ',', '.') ?> VND
                        </div>

                        <div class="d-flex flex-wrap" style="gap: 8px;">
                            <?php if (SessionHelper::isAdmin()): ?>
                                <a href="/webbanhang/Product/edit/<?= $product->id ?>" class="btn btn-warning btn-sm">
                                    Sửa
                                </a>
                                <a
                                    href="/webbanhang/Product/delete/<?= $product->id ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')"
                                >
                                    Xóa
                                </a>
                            <?php endif; ?>

                            <a href="/webbanhang/Product/addToCart/<?= $product->id ?>" class="btn btn-primary btn-sm ml-auto">
                                Thêm vào giỏ
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2 class="h5">Chưa có sản phẩm</h2>
        <p class="text-muted mb-0">Khi có dữ liệu sản phẩm, danh sách sẽ hiển thị tại đây.</p>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../shares/footer.php'; ?>
