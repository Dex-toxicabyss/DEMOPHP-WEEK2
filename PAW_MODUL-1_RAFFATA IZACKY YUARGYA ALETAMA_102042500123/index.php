<?php


$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga" => 1620000,
        "stok" => 4,
        "gambar" => "monitor.svg"
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga" => 7650000,
        "stok" => 3,
        "gambar" => "laptop.svg"
    ],
    [
        "nama" => "Mechanical Keyboard",
        "kategori" => "Keyboard",
        "harga" => 850000,
        "stok" => 8,
        "gambar" => "keyboard.svg"
    ],
    [
        "nama" => "Wireless Mouse",
        "kategori" => "Mouse",
        "harga" => 650000,
        "stok" => 0,
        "gambar" => "mouse.svg"
    ],
    [
        "nama" => "USB-C Hub 7-in-1",
        "kategori" => "Accessories",
        "harga" => 1150000,
        "stok" => 2,
        "gambar" => "hub.svg"
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 1250000,
        "stok" => 5,
        "gambar" => "headset.svg"
    ]
];


function rupiah($angka)
{
    return "Rp" . number_format($angka, 0, ',', '.');
}

// Challenge:

function hitungDiskon($harga)
{
    return $harga >= 1000000 ? 10 : 0;
}

// Menghitung harga setelah diskon menggunakan PHP
function hargaSetelahDiskon($harga)
{
    $diskon = hitungDiskon($harga);
    return $harga - ($harga * $diskon / 100);
}


$totalProduk = count($products);
$totalStok = array_sum(array_column($products, "stok"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store | Simple Tech Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
    <header class="navbar">
        <div class="container nav-inner">
            <a href="#" class="brand">Cia<span>Store</span></a>

            <nav class="nav-menu">
                <a href="#home">Home</a>
                <a href="#produk">Produk</a>
                <a href="#tentang">Tentang</a>
            </nav>

            <a href="#produk" class="nav-button">Belanja</a>
        </div>
    </header>

    <main>
    
        <section class="hero" id="home">
            <div class="container hero-content">
                <div class="hero-text">
                    <p class="eyebrow">CIA STORE</p>
                    <h1>Simple Tech Store</h1>
                    <p class="hero-description">
                        Temukan berbagai perangkat teknologi untuk mendukung
                        aktivitas belajar, kerja, dan produktivitas kamu.
                    </p>

                    <a href="#produk" class="primary-button">
                        Lihat Produk
                    </a>
                </div>

                <div class="hero-card">
                    <div class="hero-icon">⌁</div>
                    <p>Tech Essentials</p>
                    <strong>Simple. Useful. Reliable.</strong>
                </div>
            </div>
        </section>

        
        <section class="summary" id="tentang">
            <div class="container summary-grid">
                <div>
                    <p class="section-label">KATALOG</p>
                    <h2>Katalog Produk</h2>
                    <p class="section-description">
                        Semua produk di bawah diambil dari array PHP dan
                        ditampilkan menggunakan perulangan <code>foreach</code>.
                    </p>
                </div>

                <div class="stats">
                    <div class="stat-card">
                        <span>Jumlah Produk</span>
                        <strong><?= $totalProduk; ?></strong>
                    </div>

                    <div class="stat-card">
                        <span>Total Stok</span>
                        <strong><?= $totalStok; ?></strong>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="products-section" id="produk">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <p class="section-label">CIA STORE</p>
                        <h2>Produk Pilihan</h2>
                    </div>

                    <span class="product-count">
                        <?= $totalProduk; ?> produk
                    </span>
                </div>

                <div class="product-grid">

                    <?php foreach ($products as $product): ?>
                        <?php
                            $diskon = hitungDiskon($product["harga"]);
                            $hargaAkhir = hargaSetelahDiskon($product["harga"]);
                            $tersedia = $product["stok"] > 0;
                        ?>

                        <article class="product-card">
                            <div class="product-image">
                                <img
                                    src="images/<?= htmlspecialchars($product["gambar"]); ?>"
                                    alt="<?= htmlspecialchars($product["nama"]); ?>"
                                >
                                <span><?= htmlspecialchars($product["kategori"]); ?></span>
                            </div>

                            <div class="product-content">
                                <div class="product-top">
                                    <span class="category">
                                        <?= htmlspecialchars($product["kategori"]); ?>
                                    </span>

                                    <span class="stock <?= $tersedia ? "available" : "empty"; ?>">
                                        <?= $tersedia ? "Tersedia" : "Stok Habis"; ?>
                                    </span>
                                </div>

                                <h3><?= htmlspecialchars($product["nama"]); ?></h3>

                                <div class="price-area">
                                    <?php if ($diskon > 0): ?>
                                        <p class="old-price">
                                            <?= rupiah($product["harga"]); ?>
                                        </p>

                                        <div class="price-row">
                                            <strong class="price">
                                                <?= rupiah($hargaAkhir); ?>
                                            </strong>

                                            <span class="discount">
                                                -<?= $diskon; ?>%
                                            </span>
                                        </div>
                                    <?php else: ?>
                                        <strong class="price">
                                            <?= rupiah($product["harga"]); ?>
                                        </strong>
                                    <?php endif; ?>
                                </div>

                                <div class="stock-info">
                                    <span>Stok</span>
                                    <strong><?= $product["stok"]; ?></strong>
                                </div>

                                <?php if ($tersedia): ?>
                                    <button class="buy-button" type="button">
                                        Beli Sekarang
                                    </button>
                                <?php else: ?>
                                    <button class="buy-button disabled" type="button" disabled>
                                        Stok Habis
                                    </button>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    </main>

    
    <footer class="footer">
        <div class="container footer-inner">
            <div>
                <strong>CiaStore</strong>
                <p>Simple Tech Store untuk kebutuhan teknologi sehari-hari.</p>
            </div>

            <p>&copy; <?= date("Y"); ?> Cia Store. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
