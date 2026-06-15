<?php include 'app/views/shares/header.php'; ?>

<style>
    .category-toolbar {
        align-items: center;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
        padding-bottom: 16px;
    }

    .category-count {
        background: #f1f3f5;
        border-radius: 999px;
        color: #495057;
        font-size: 14px;
        padding: 6px 12px;
    }

    .category-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    }

    .category-card {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        box-shadow: 0 6px 18px rgba(33, 37, 41, 0.06);
        min-height: 170px;
        padding: 20px;
        transition: transform 0.18s ease, box-shadow 0.18s ease;
    }

    .category-card:hover {
        box-shadow: 0 10px 24px rgba(33, 37, 41, 0.1);
        transform: translateY(-2px);
    }

    .category-id {
        color: #868e96;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .category-name {
        color: #212529;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .category-description {
        color: #5c6770;
        line-height: 1.5;
        margin-bottom: 0;
    }

    .empty-state {
        background: #f8f9fa;
        border: 1px dashed #ced4da;
        border-radius: 8px;
        padding: 32px;
        text-align: center;
    }
</style>

<div class="category-toolbar">
    <div>
        <h1 class="h3 mb-1">Danh mục sản phẩm</h1>
        <p class="text-muted mb-0">Theo dõi các nhóm sản phẩm đang có trong cửa hàng.</p>
    </div>

    <span class="category-count">
        <?= count($categories) ?> danh mục
    </span>
</div>

<?php if (!empty($categories)): ?>
    <div class="category-grid">
        <?php foreach ($categories as $category): ?>
            <article class="category-card">
                <div class="category-id">
                    Mã danh mục #<?= htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8') ?>
                </div>

                <h2 class="category-name">
                    <?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') ?>
                </h2>

                <p class="category-description">
                    <?= htmlspecialchars($category->description ?: 'Chưa có mô tả cho danh mục này.', ENT_QUOTES, 'UTF-8') ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="empty-state">
        <h2 class="h5">Chưa có danh mục</h2>
        <p class="text-muted mb-0">Khi có dữ liệu danh mục, danh sách sẽ hiển thị tại đây.</p>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>
