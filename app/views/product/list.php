<?php include __DIR__ . '/../shares/header.php'; ?>

<style>
.page-wrap { position: relative; min-height: 100vh; overflow: hidden; }
canvas#bg {
    position: fixed;
    inset: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}
.page-content { position: relative; z-index: 1; }
.card {
    background: rgba(255, 255, 255, 0.55) !important;
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 0.5px solid rgba(255, 255, 255, 0.4) !important;
}

.card-footer {
    background: rgba(255, 255, 255, 0.3) !important;
    border-top: 0.5px solid rgba(255, 255, 255, 0.4) !important;
}

/* Navbar trong suốt */
.navbar {
    background: rgba(255, 255, 255, 0.6) !important;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}
</style>

<canvas id="bg"></canvas>
<div class="page-wrap">
<div class="page-content">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 font-weight-bold">📦 Danh sách sản phẩm</h1>
    <a href="/webbanhang/Product/add" class="btn btn-success">➕ Thêm sản phẩm mới</a>
</div>

<div class="row">
<?php foreach ($products as $product): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">

            <?php if ($product->image): ?>
                <img src="/webbanhang/<?= $product->image ?>"
                     alt="<?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>"
                     class="card-img-top"
                     style="height: 200px; object-fit: cover;">
            <?php else: ?>
                <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center"
                     style="height: 200px;">
                    <span class="text-white">Không có ảnh</span>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <h5 class="card-title">
                    <a href="/webbanhang/Product/show/<?= $product->id ?>" class="text-primary">
                        <?= htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </h5>
                <p class="card-text text-muted small"><?= htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') ?></p>
                <p class="font-weight-bold text-danger">
                    💰 <?= number_format($product->price, 0, ',', '.') ?> VND
                </p>
                <span class="badge badge-info"><?= htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <div class="card-footer">
    <div class="d-flex gap-2 flex-wrap mt-2">

        <?php if (SessionHelper::isAdmin()): ?>
        <a href="/webbanhang/Product/edit/<?= $product->id ?>"
           class="btn btn-warning btn-sm">✏️ Sửa</a>
        <a href="/webbanhang/Product/delete/<?= $product->id ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">🗑️ Xóa</a>
        <?php endif; ?>

        <a href="/webbanhang/Product/addToCart/<?= $product->id ?>"
           class="btn btn-primary btn-sm btn-block">🛒 Thêm vào giỏ hàng</a>

             </div>
              </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
<script>
const canvas = document.getElementById('bg');
const ctx = canvas.getContext('2d');

function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resize();
window.addEventListener('resize', resize);

const colors = ['#B5D4F4','#9FE1CB','#CECBF6','#F5C4B3','#C0DD97','#FAC775','#F4C0D1'];

const particles = Array.from({length: 38}, (_, i) => ({
    x: Math.random() * canvas.width,
    y: Math.random() * canvas.height,
    r: 4 + Math.random() * 18,
    vx: (Math.random() - 0.5) * 0.5,
    vy: (Math.random() - 0.5) * 0.5,
    color: colors[i % colors.length],
    alpha: 0.18 + Math.random() * 0.22,
    pulse: Math.random() * Math.PI * 2,
}));

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    const t = Date.now() / 1000;

    particles.forEach(p => {
        p.x += p.vx;
        p.y += p.vy;
        if (p.x < -p.r) p.x = canvas.width + p.r;
        if (p.x > canvas.width + p.r) p.x = -p.r;
        if (p.y < -p.r) p.y = canvas.height + p.r;
        if (p.y > canvas.height + p.r) p.y = -p.r;

        const pulse = p.alpha + Math.sin(t + p.pulse) * 0.06;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r + Math.sin(t * 0.8 + p.pulse) * 2, 0, Math.PI * 2);
        ctx.fillStyle = p.color;
        ctx.globalAlpha = Math.max(0, pulse);
        ctx.fill();
        ctx.globalAlpha = 1;
    });

    particles.forEach((a, i) => {
        particles.slice(i + 1).forEach(b => {
            const dx = a.x - b.x, dy = a.y - b.y;
            const dist = Math.sqrt(dx*dx + dy*dy);
            if (dist < 120) {
                ctx.beginPath();
                ctx.moveTo(a.x, a.y);
                ctx.lineTo(b.x, b.y);
                ctx.strokeStyle = '#B5D4F4';
                ctx.globalAlpha = (1 - dist / 120) * 0.12;
                ctx.lineWidth = 0.8;
                ctx.stroke();
                ctx.globalAlpha = 1;
            }
        });
    });

    requestAnimationFrame(draw);
}
draw();
</script>
<?php include __DIR__ . '/../shares/footer.php'; ?>