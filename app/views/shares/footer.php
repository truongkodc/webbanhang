</main>

<footer class="app-footer">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <h5 class="app-footer-title">Quản lý sản phẩm</h5>
                <p class="mb-0">
                    Hệ thống hỗ trợ theo dõi sản phẩm, danh mục và đơn hàng theo cách rõ ràng,
                    dễ thao tác trong quá trình học và demo.
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="app-footer-title">Liên kết nhanh</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="/webbanhang/Product/">Sản phẩm</a></li>
                    <li><a href="/webbanhang/Category/list">Danh mục</a></li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li><a href="/webbanhang/Product/add">Thêm sản phẩm</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="app-footer-title">Trạng thái</h5>
                <p class="mb-0">
                    <?= SessionHelper::isLoggedIn() ? 'Đang đăng nhập' : 'Khách truy cập' ?>
                </p>
            </div>
        </div>
    </div>

    <div class="text-center py-3" style="background: #0b1120;">
        © 2025 Quản lý sản phẩm. All rights reserved.
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
