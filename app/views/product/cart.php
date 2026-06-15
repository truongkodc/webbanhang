<?php include 'app/views/shares/header.php'; ?>

<div class="page-head">
    <div>
        <h1 class="page-title">Giỏ hàng</h1>
        <p class="page-subtitle">Kiểm tra sản phẩm trước khi chuyển sang bước thanh toán.</p>
    </div>
</div>

<?php if (!empty($cart)): ?>
    <div class="surface surface-pad">
        <?php foreach ($cart as $id => $item): ?>
            <div class="cart-item p-3 mb-3">
                <div class="row align-items-center">
                    <div class="col-md-2 mb-3 mb-md-0">
                        <?php if ($item['image']): ?>
                            <img
                                src="/webbanhang/<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>"
                                class="img-fluid"
                                style="border-radius: 8px;"
                            >
                        <?php else: ?>
                            <div class="product-placeholder" style="border-radius: 8px;">Ảnh</div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <h2 class="h5 mb-1"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="text-muted mb-md-0">
                            Số lượng: <?= htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                    </div>

                    <div class="col-md-4 text-md-right">
                        <div class="price-text">
                            <?= number_format($item['price'], 0, ',', '.') ?> VND
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="d-flex flex-wrap justify-content-between mt-4" style="gap: 10px;">
            <a href="/webbanhang/Product" class="btn btn-outline-secondary">Tiếp tục mua sắm</a>
            <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh toán</a>
        </div>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2 class="h5">Giỏ hàng đang trống</h2>
        <p class="text-muted">Hãy chọn một vài sản phẩm để bắt đầu đơn hàng.</p>
        <a href="/webbanhang/Product" class="btn btn-primary">Xem sản phẩm</a>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
