<?php include 'app/views/shares/header.php'; ?>

<div class="form-shell" style="max-width: 520px;">
    <div class="page-head">
        <div>
            <h1 class="page-title">Đăng nhập</h1>
            <p class="page-subtitle">Truy cập tài khoản để quản lý và mua hàng thuận tiện hơn.</p>
        </div>
    </div>

    <div class="surface surface-pad">
        <form action="/webbanhang/account/checklogin" method="post">
            <div class="form-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" id="username" name="username" class="form-control form-control-lg">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control form-control-lg">
            </div>

            <button class="btn btn-primary btn-block" type="submit">Đăng nhập</button>

            <p class="text-center text-muted mt-4 mb-0">
                Chưa có tài khoản?
                <a href="/webbanhang/account/register">Đăng ký</a>
            </p>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
