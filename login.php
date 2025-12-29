<?php
session_start(); include 'db.php';
if (isset($_POST['login'])) {
    $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username = '$_POST[username]'"));
    if ($r && password_verify($_POST['password'], $r['password'])) {
        $_SESSION['login'] = 1; header("Location: dashboard.php"); exit;
    } $e = 1;
}
?>
<!DOCTYPE html>
<html lang="id"><head><title>Login</title><script src="https://cdn.tailwindcss.com"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"></head>
<body class="bg-gradient-to-br from-blue-50 to-white h-screen flex items-center justify-center p-6 font-sans">
    <div class="max-w-md w-full text-center">
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl border border-white relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-50 rounded-full opacity-50"></div>
            <div class="inline-flex p-5 bg-slate-800 text-white rounded-[2rem] mb-6 shadow-xl relative"><i class="bi bi-shield-lock text-4xl"></i></div>
            <h2 class="text-4xl font-black text-slate-800 tracking-tighter mb-8">Admin Jatijajar</h2>
            <?php if(isset($e)): ?><p class="text-red-500 font-bold mb-6 bg-red-50 py-3 rounded-2xl text-sm">Login Gagal!</p><?php endif; ?>
            <form method="POST" class="space-y-4 relative">
                <input type="text" name="username" placeholder="Username" class="w-full p-5 bg-slate-50 border rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 transition text-lg font-bold" required>
                <input type="password" name="password" placeholder="Password" class="w-full p-5 bg-slate-50 border rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 transition text-lg font-bold" required>
                <button type="submit" name="login" class="w-full bg-slate-800 text-white py-5 rounded-3xl font-black text-xl hover:bg-black transition shadow-xl">MASUK</button>
            </form>
            <a href="index.php" class="block mt-8 text-slate-400 font-bold hover:text-blue-600 transition tracking-tighter italic">← Kembali ke Katalog</a>
        </div>
    </div>
</body></html>