<?php include 'app/views/shares/header.php'; ?>

<div class="form-shell" style="max-width: 520px;">
    <div class="page-head">
        <div>
            <h1 class="page-title">Đăng nhập</h1>
            <p class="page-subtitle">Truy cập tài khoản để quản lý và mua hàng thuận tiện hơn.</p>
        </div>
    </div>

    <div class="surface surface-pad">
        <div id="login-error" class="alert alert-danger" style="display:none;">
            Sai tên đăng nhập hoặc mật khẩu.
        </div>

        <form id="login-form">
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

<script>
document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault();
    document.getElementById('login-error').style.display = 'none';

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    fetch('/webbanhang/account/checkLogin', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username: username, password: password })
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
        if (data.token) {
            localStorage.setItem('jwtToken', data.token);
            location.href = '/webbanhang/product';
        } else {
            document.getElementById('login-error').style.display = 'block';
        }
    })
    .catch(function() {
        document.getElementById('login-error').style.display = 'block';
    });
});
</script>

<?php include 'app/views/shares/footer.php'; ?>