<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <style>
        :root {
            --app-bg: #f6f7f9;
            --app-surface: #ffffff;
            --app-border: #e2e6ea;
            --app-text: #1f2933;
            --app-muted: #6c7580;
            --app-primary: #1f6feb;
            --app-primary-soft: #e8f1ff;
            --app-accent: #16a085;
            --app-danger: #dc3545;
            --app-warning: #f0ad4e;
            --app-shadow: 0 10px 28px rgba(31, 41, 51, 0.08);
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(31, 111, 235, 0.08), transparent 30%),
                linear-gradient(180deg, #fbfcfd 0%, var(--app-bg) 100%);
            color: var(--app-text);
            min-height: 100vh;
        }

        a {
            color: var(--app-primary);
        }

        .app-navbar {
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid var(--app-border);
            box-shadow: 0 4px 20px rgba(31, 41, 51, 0.05);
        }

        .navbar-brand {
            color: var(--app-text) !important;
            font-weight: 700;
            letter-spacing: 0;
        }

        .navbar-brand-mark {
            background: var(--app-primary);
            border-radius: 6px;
            color: #fff;
            display: inline-block;
            height: 28px;
            line-height: 28px;
            margin-right: 8px;
            text-align: center;
            width: 28px;
        }

        .nav-link {
            color: #4b5563 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--app-primary) !important;
        }

        .app-main {
            padding-bottom: 32px;
            padding-top: 24px;
        }

        .page-head {
            align-items: flex-start;
            display: flex;
            gap: 16px;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 750;
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: var(--app-muted);
            margin-bottom: 0;
        }

        .surface {
            background: var(--app-surface);
            border: 1px solid var(--app-border);
            border-radius: 8px;
            box-shadow: var(--app-shadow);
        }

        .surface-pad {
            padding: 24px;
        }

        .product-card,
        .category-card,
        .cart-item {
            background: var(--app-surface);
            border: 1px solid var(--app-border);
            border-radius: 8px;
            box-shadow: 0 8px 22px rgba(31, 41, 51, 0.06);
            transition: box-shadow 0.18s ease, transform 0.18s ease;
        }

        .product-card:hover,
        .category-card:hover {
            box-shadow: 0 12px 30px rgba(31, 41, 51, 0.11);
            transform: translateY(-2px);
        }

        .product-media,
        .product-placeholder {
            aspect-ratio: 4 / 3;
            border-bottom: 1px solid var(--app-border);
            object-fit: cover;
            width: 100%;
        }

        .product-placeholder {
            align-items: center;
            background: linear-gradient(135deg, #edf2f7, #dbe7f3);
            color: #718096;
            display: flex;
            font-weight: 600;
            justify-content: center;
        }

        .badge-soft {
            background: var(--app-primary-soft);
            border-radius: 999px;
            color: #1557b0;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 10px;
        }

        .price-text {
            color: var(--app-danger);
            font-size: 18px;
            font-weight: 750;
        }

        .form-shell {
            margin: 0 auto;
            max-width: 820px;
        }

        .form-control {
            border-color: #d5dce3;
            border-radius: 6px;
        }

        .form-control:focus {
            border-color: var(--app-primary);
            box-shadow: 0 0 0 0.18rem rgba(31, 111, 235, 0.14);
        }

        .btn {
            border-radius: 6px;
            font-weight: 650;
        }

        .empty-state {
            background: var(--app-surface);
            border: 1px dashed #c8d0d8;
            border-radius: 8px;
            padding: 36px;
            text-align: center;
        }

        .app-footer {
            background: #111827;
            color: #d1d5db;
            margin-top: 48px;
        }

        .app-footer a {
            color: #e5e7eb;
        }

        .app-footer-title {
            color: #fff;
            font-size: 16px;
            font-weight: 750;
            text-transform: uppercase;
        }

        @media (max-width: 767.98px) {
            .page-head {
                display: block;
            }

            .page-head .btn {
                margin-top: 14px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light app-navbar">
    <a class="navbar-brand" href="/webbanhang/Product/">
        <span class="navbar-brand-mark">S</span> Quản lý sản phẩm
    </a>

    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/Product/">Sản phẩm</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/webbanhang/Category/list">Danh mục</a>
            </li>

            <?php if (SessionHelper::isAdmin()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                </li>
            <?php endif; ?>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <?php if (SessionHelper::isLoggedIn()): ?>
                    <span class="nav-link">
                        <?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') ?>
                        (<?= htmlspecialchars(SessionHelper::getRole(), ENT_QUOTES, 'UTF-8') ?>)
                    </span>
                <?php else: ?>
                    <a class="nav-link" href="/webbanhang/account/login">Đăng nhập</a>
                <?php endif; ?>
            </li>

            <?php if (SessionHelper::isLoggedIn()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang/account/logout">Đăng xuất</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<main class="container app-main">
