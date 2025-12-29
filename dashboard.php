<?php
session_start(); include 'db.php';
if (!isset($_SESSION['login'])) header("Location: login.php");
$f = $_GET['f'] ?? '';
$s = ['az'=>'nama_barang ASC','za'=>'nama_barang DESC','murah'=>'harga ASC','mahal'=>'harga DESC'][$f] ?? 'id DESC';
$res = mysqli_query($conn, "SELECT * FROM barang ORDER BY $s");
?>
<!DOCTYPE html>
<html lang="id"><head><title>Dashboard</title><script src="https://cdn.tailwindcss.com"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"></head>
<body class="bg-slate-50 font-sans text-slate-800">
<nav class="bg-white border-b px-8 py-5 flex justify-between items-center shadow-sm"><b class="text-xl tracking-tight">Jatijajar Admin</b><a href="logout.php" class="text-red-500 font-bold hover:underline">Keluar</a></nav>
<div class="max-w-6xl mx-auto p-8">
    <div class="flex justify-between items-center mb-10"><div><h1 class="text-3xl font-extrabold">Manajemen Stok</h1><p class="text-slate-500 text-lg">Kelola data bahan kue</p></div><a href="add.php" class="bg-slate-800 text-white px-8 py-3 rounded-2xl font-bold shadow-xl hover:bg-black transition">+ Tambah Barang</a></div>
    <div class="bg-white p-5 rounded-3xl shadow-sm border mb-8 flex gap-4 items-center overflow-x-auto"><b class="uppercase text-slate-400 text-xs tracking-widest px-2">Urutkan:</b>
        <?php foreach(['az'=>'A-Z','murah'=>'Termurah','mahal'=>'Termahal'] as $k=>$v): ?>
        <a href="?f=<?=$k?>" class="px-6 py-2 rounded-full border-2 font-bold transition <?=$f==$k?'bg-slate-800 border-slate-800 text-white':'hover:border-slate-800'?>"><?=$v?></a>
        <?php endforeach; ?><a href="dashboard.php" class="ml-auto text-red-400 font-bold">Reset</a></div>
    <div class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden border border-slate-100">
        <table class="w-full text-left">
            <thead class="bg-slate-50 border-b text-slate-400 text-sm uppercase font-black"><tr><th class="px-8 py-6">Produk</th><th class="px-8 py-6">Harga Satuan</th><th class="px-8 py-6 text-center">Aksi</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                <?php while($r=mysqli_fetch_assoc($res)): ?>
                <tr class="hover:bg-slate-50 transition"><td class="px-8 py-6 flex items-center gap-6"><img src="uploads/<?=$r['gambar']?>" class="w-16 h-16 rounded-2xl object-cover shadow-md border-2 border-white"><b class="text-xl text-slate-700 font-bold leading-none"><?=$r['nama_barang']?></b></td>
                <td class="px-8 py-6 text-lg font-black text-emerald-600">Rp<?=number_format($r['harga'],0,',','.')?></td>
                <td class="px-8 py-6 text-center"><div class="flex justify-center gap-4">
                    <a href="edit.php?id=<?=$r['id']?>" class="p-3 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition"><i class="bi bi-pencil-square text-xl"></i></a>
                    <a href="delete.php?id=<?=$r['id']?>" onclick="return confirm('Hapus?')" class="p-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition"><i class="bi bi-trash text-xl"></i></a>
                </div></td></tr><?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body></html>