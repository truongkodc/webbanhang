<?php include 'app/views/shares/header.php'; ?>

<div class="page-head">
    <div>
        <h1 class="page-title">Danh mục sản phẩm</h1>
        <p class="page-subtitle">Các nhóm sản phẩm đang được dùng để tổ chức cửa hàng.</p>
    </div>

    <span class="badge-soft"><?= count($categories) ?> danh mục</span>
</div>

<?php if (!empty($categories)): ?>
    <div class="row">
        <?php foreach ($categories as $category): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <article class="category-card h-100 p-4">
                    <div class="text-muted small mb-2">
                        Mã danh mục #<?= htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8') ?>
                    </div>

                    <h2 class="h5 font-weight-bold">
                        <?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>
                    </h2>

                    <p class="text-muted mb-0">
                        <?= htmlspecialchars($category->description ?: 'Chưa có mô tả cho danh mục này.', ENT_QUOTES, 'UTF-8') ?>
                    </p>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2 class="h5">Chưa có danh mục</h2>
        <p class="text-muted mb-0">Khi có dữ liệu danh mục, danh sách sẽ hiển thị tại đây.</p>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
