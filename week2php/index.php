<?php
$submitted = false;
$errors = [];
$data = [
    'nama' => '',
    'email' => '',
    'kelamin' => '',
    'alamat' => '',
    'telepon' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['nama']    = trim($_POST['nama'] ?? '');
    $data['email']   = trim($_POST['email'] ?? '');
    $data['kelamin'] = trim($_POST['kelamin'] ?? '');
    $data['alamat']  = trim($_POST['alamat'] ?? '');
    $data['telepon'] = trim($_POST['telepon'] ?? '');

    if ($data['nama'] === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid.';
    }
    if ($data['kelamin'] === '') {
        $errors[] = 'Jenis kelamin wajib dipilih.';
    }
    if ($data['alamat'] === '') {
        $errors[] = 'Alamat wajib diisi.';
    }
    if ($data['telepon'] === '' || !preg_match('/^[0-9+\-\s]+$/', $data['telepon'])) {
        $errors[] = 'Nomor telepon tidak valid.';
    }

    if (empty($errors)) {
        $submitted = true;
    }
}

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Data Pengguna — Studi Kasus 2</title>
<style>
  :root {
    --bg: #F7F8FA;
    --ink: #14171C;
    --ink-soft: #5C6470;
    --line: #DADFE6;
    --accent: #2F6FED;
    --error: #B3261E;
    --error-bg: #FCEAE9;
    --ok: #3F7D5C;
    --ok-bg: #E5F1EA;
  }
  * { box-sizing: border-box; }
  body {
    margin: 0;
    background: var(--bg);
    color: var(--ink);
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
    line-height: 1.6;
  }
  .wrap {
    max-width: 640px;
    margin: 0 auto;
    padding: 3rem 1.5rem 4rem;
  }
  header h1 {
    font-family: Georgia, serif;
    font-size: 1.6rem;
    margin: 0 0 0.3rem;
  }
  header p {
    color: var(--ink-soft);
    margin: 0 0 2rem;
    font-size: 0.92rem;
  }
  .alert {
    padding: 0.85rem 1rem;
    border-left: 3px solid var(--error);
    background: var(--error-bg);
    font-size: 0.88rem;
    margin-bottom: 1.5rem;
  }
  .alert ul {
    margin: 0.3rem 0 0;
    padding-left: 1.1rem;
  }
  .result {
    border: 1px solid var(--line);
    padding: 1.5rem;
    margin-bottom: 2rem;
    background: #fff;
  }
  .result h2 {
    font-family: Georgia, serif;
    font-size: 1.05rem;
    margin: 0 0 1rem;
    color: var(--ok);
  }
  .result dl {
    margin: 0;
  }
  .result__row {
    display: grid;
    grid-template-columns: 9rem 1fr;
    gap: 0.5rem;
    padding: 0.4rem 0;
    border-bottom: 1px solid var(--line);
    font-size: 0.92rem;
  }
  .result__row:last-child {
    border-bottom: none;
  }
  .result__row dt {
    color: var(--ink-soft);
  }
  .result__row dd {
    margin: 0;
  }
  form {
    border: 1px solid var(--line);
    padding: 1.5rem;
    background: #fff;
  }
  .field {
    margin-bottom: 1.1rem;
  }
  .field:last-of-type {
    margin-bottom: 1.5rem;
  }
  label {
    display: block;
    font-size: 0.85rem;
    color: var(--ink-soft);
    margin-bottom: 0.3rem;
  }
  input[type="text"],
  input[type="email"],
  input[type="tel"],
  textarea,
  select {
    width: 100%;
    padding: 0.6rem 0.7rem;
    border: 1px solid var(--line);
    background: var(--bg);
    color: var(--ink);
    font-family: inherit;
    font-size: 0.95rem;
    border-radius: 2px;
  }
  input:focus,
  textarea:focus,
  select:focus {
    outline: 2px solid var(--accent);
    outline-offset: 1px;
  }
  textarea {
    resize: vertical;
    min-height: 4.5rem;
  }
  .radio-group {
    display: flex;
    gap: 1.5rem;
    padding-top: 0.2rem;
  }
  .radio-group label {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    color: var(--ink);
    font-size: 0.95rem;
    margin: 0;
  }
  .radio-group input {
    width: auto;
  }
  button {
    background: var(--ink);
    color: #fff;
    border: none;
    padding: 0.7rem 1.6rem;
    font-size: 0.95rem;
    font-family: inherit;
    cursor: pointer;
    border-radius: 2px;
  }
  button:hover {
    background: var(--accent);
  }
</style>
</head>
<body>

<div class="wrap">
  <header>
    <h1>Form Data Pengguna</h1>
    <p>Studi Kasus 2 — mengirim data lewat POST dan memprosesnya dengan PHP.</p>
  </header>

  <?php if (!empty($errors)): ?>
    <div class="alert">
      Ada isian yang belum benar:
      <ul>
        <?php foreach ($errors as $err): ?>
          <li><?= e($err) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($submitted): ?>
    <div class="result">
      <h2>Data tersimpan</h2>
      <dl>
        <div class="result__row">
          <dt>Nama</dt>
          <dd><?= e($data['nama']) ?></dd>
        </div>
        <div class="result__row">
          <dt>Email</dt>
          <dd><?= e($data['email']) ?></dd>
        </div>
        <div class="result__row">
          <dt>Jenis Kelamin</dt>
          <dd><?= e($data['kelamin']) ?></dd>
        </div>
        <div class="result__row">
          <dt>Alamat</dt>
          <dd><?= e($data['alamat']) ?></dd>
        </div>
        <div class="result__row">
          <dt>Nomor Telepon</dt>
          <dd><?= e($data['telepon']) ?></dd>
        </div>
      </dl>
    </div>
  <?php endif; ?>

  <form action="index.php" method="POST">
    <div class="field">
      <label for="nama">Nama</label>
      <input type="text" id="nama" name="nama" value="<?= e($data['nama']) ?>" required>
    </div>

    <div class="field">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="<?= e($data['email']) ?>" required>
    </div>

    <div class="field">
      <label>Jenis Kelamin</label>
      <div class="radio-group">
        <label>
          <input type="radio" name="kelamin" value="Laki-laki" <?= $data['kelamin'] === 'Laki-laki' ? 'checked' : '' ?> required>
          Laki-laki
        </label>
        <label>
          <input type="radio" name="kelamin" value="Perempuan" <?= $data['kelamin'] === 'Perempuan' ? 'checked' : '' ?>>
          Perempuan
        </label>
      </div>
    </div>

    <div class="field">
      <label for="alamat">Alamat</label>
      <textarea id="alamat" name="alamat" required><?= e($data['alamat']) ?></textarea>
    </div>

    <div class="field">
      <label for="telepon">Nomor Telepon</label>
      <input type="tel" id="telepon" name="telepon" value="<?= e($data['telepon']) ?>" required>
    </div>

    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>