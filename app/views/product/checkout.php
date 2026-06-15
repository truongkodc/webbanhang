<?php include 'app/views/shares/header.php'; ?>

<div class="form-shell">
    <div class="page-head">
        <div>
            <h1 class="page-title">Thanh toán</h1>
            <p class="page-subtitle">Nhập thông tin nhận hàng để hoàn tất đơn mua.</p>
        </div>
    </div>

    <div class="surface surface-pad">
        <form method="POST" action="/webbanhang/Product/processCheckout">
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
            </div>

            <div class="d-flex flex-wrap justify-content-between" style="gap: 10px;">
                <a href="/webbanhang/Product/cart" class="btn btn-outline-secondary">Quay lại giỏ hàng</a>
                <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
