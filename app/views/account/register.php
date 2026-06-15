<?php include 'app/views/shares/header.php'; ?>

<div class="form-shell">
    <div class="page-head">
        <div>
            <h1 class="page-title">Đăng ký tài khoản</h1>
            <p class="page-subtitle">Tạo tài khoản mới để sử dụng các chức năng của cửa hàng.</p>
        </div>
    </div>

    <div class="surface surface-pad">
        <?php if (isset($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/webbanhang/account/save" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <div class="form-group col-md-6">
                    <label for="fullname">Họ tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group col-md-6">
                    <label for="confirmpassword">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-between" style="gap: 10px;">
                <a href="/webbanhang/account/login" class="btn btn-outline-secondary">Đã có tài khoản</a>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
