<?php include __DIR__ . '/../shares/header.php'; ?>

<div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
    <nav style="margin-bottom: 20px; font-size: 14px; color: #666;">
        <a href="/webbanhang/product" style="color: #007bff; text-decoration: none;">
            Danh sách sản phẩm
        </a>
        <span style="margin: 0 8px;">&gt;</span>
        <span><?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?></span>
    </nav>

    <div style="border: 1px solid #ddd; border-radius: 8px; padding: 30px; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.08);">
        <div style="display: flex; gap: 40px; align-items: flex-start;">
            <div style="flex-shrink: 0;">
                <?php if (!empty($product->image)): ?>
                    <img
                        src="/webbanhang/<?= htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>"
                        style="width: 250px; height: 250px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;"
                    >
                <?php else: ?>
                    <div style="width: 250px; height: 250px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #aaa;">
                        Không có ảnh
                    </div>
                <?php endif; ?>
            </div>

            <div style="flex: 1;">
                <h1 style="color: #0066cc; margin: 0 0 12px 0; font-size: 28px;">
                    <?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>
                </h1>

                <p style="color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 16px;">
                    <?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?>
                </p>

                <p style="font-size: 16px; margin-bottom: 8px;">
                    <strong>Giá:</strong>
                    <span style="color: #e44; font-size: 20px; font-weight: bold;">
                        <?= number_format($product->price, 2) ?> VND
                    </span>
                </p>

                <p style="font-size: 15px; margin-bottom: 24px;">
                    <strong>Danh mục:</strong>
                    <span style="color: #555;">
                        <?= htmlspecialchars($product->category_name ?? 'Chưa phân loại', ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </p>

                <div style="display: flex; gap: 10px;">
                    <?php if (SessionHelper::isAdmin()): ?>
                        <a
                            href="/webbanhang/product/edit/<?= $product->id ?>"
                            style="background: #ffc107; color: #000; padding: 10px 24px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                        >
                            Sửa
                        </a>
                        <a
                            href="/webbanhang/product/delete/<?= $product->id ?>"
                            onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                            style="background: #dc3545; color: #fff; padding: 10px 24px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                        >
                            Xóa
                        </a>
                    <?php endif; ?>

                    <a
                        href="/webbanhang/product"
                        style="background: #6c757d; color: #fff; padding: 10px 24px; border-radius: 5px; text-decoration: none; font-weight: bold;"
                    >
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shares/footer.php'; ?>
