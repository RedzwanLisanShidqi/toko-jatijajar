<?php
session_start(); include 'db.php';
if (!isset($_SESSION['login'])) header("Location: login.php");
$id = $_GET['id'];
$b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id = $id"));
if(isset($_POST['update'])) {
    $f = ($_FILES['foto']['error'] === 4) ? $_POST['old'] : time().'_'.$_FILES['foto']['name'];
    if($_FILES['foto']['error'] !== 4) move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/".$f);
    mysqli_query($conn, "UPDATE barang SET nama_barang='$_POST[nama]', harga='$_POST[harga]', gambar='$f' WHERE id=$id");
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="id"><head><title>Edit</title><script src="https://cdn.tailwindcss.com"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"></head>
<body class="bg-gradient-to-tr from-blue-50 to-white min-h-screen p-10 font-sans text-slate-800">
    <div class="max-w-xl mx-auto">
        <a href="dashboard.php" class="text-slate-400 font-bold mb-8 inline-block">← Batal</a>
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl border border-white">
            <h3 class="text-4xl font-black mb-2 tracking-tighter">Edit Produk</h3>
            <p class="text-slate-400 text-lg mb-10 italic">Update informasi stok Jatijajar</p>
            <form method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="old" value="<?=$b['gambar']?>">
                <input type="text" name="nama" value="<?=$b['nama_barang']?>" class="w-full p-6 bg-slate-50 border rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 text-xl font-bold" required>
                <input type="number" name="harga" value="<?=$b['harga']?>" class="w-full p-6 bg-slate-50 border rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 text-xl font-bold" required>
                <div class="p-10 bg-slate-50 rounded-[3rem] border-2 border-dashed border-blue-100 text-center">
                    <img src="uploads/<?=$b['gambar']?>" id="pre" class="mx-auto h-52 rounded-3xl mb-6 shadow-2xl border-4 border-white object-cover">
                    <input type="file" name="foto" id="fc" class="hidden" onchange="const r=new FileReader(); r.onload=e=>pre.src=e.target.result; r.readAsDataURL(this.files[0])">
                    <button type="button" onclick="fc.click()" class="bg-white text-blue-600 px-8 py-3 rounded-full font-black text-xs uppercase shadow-md">Ganti Gambar</button>
                </div>
                <button type="submit" name="update" class="w-full bg-slate-800 text-white py-6 rounded-3xl font-black text-2xl hover:bg-black shadow-xl">SIMPAN PERUBAHAN</button>
            </form>
        </div>
    </div>
</body></html>