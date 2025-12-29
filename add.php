<?php
session_start(); include 'db.php';
if (!isset($_SESSION['login'])) header("Location: login.php");
if(isset($_POST['submit'])) {
    $fn = time().'_'.$_FILES['foto']['name'];
    if(move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/".$fn)) {
        mysqli_query($conn, "INSERT INTO barang VALUES('', '$_POST[nama]', '$_POST[harga]', 'Bahan', '$fn')");
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id"><head><title>Tambah | Jatijajar</title><script src="https://cdn.tailwindcss.com"></script><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"></head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen p-10 font-sans">
    <div class="max-w-xl mx-auto">
        <a href="dashboard.php" class="text-slate-400 font-bold mb-8 inline-block hover:text-blue-600">← Kembali ke Dashboard</a>
        <div class="bg-white p-12 rounded-[3.5rem] shadow-2xl border border-white">
            <h3 class="text-4xl font-black text-slate-800 mb-2 tracking-tighter">Tambah Stok</h3>
            <p class="text-slate-400 text-lg mb-10 font-medium italic">Masukkan detail bahan kue baru</p>
            <form method="POST" enctype="multipart/form-data" class="space-y-6">
                <input type="text" name="nama" placeholder="Nama Barang" class="w-full p-6 bg-slate-50 border border-slate-100 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 text-xl font-bold" required>
                <input type="number" name="harga" placeholder="Harga Jual" class="w-full p-6 bg-slate-50 border border-slate-100 rounded-3xl outline-none focus:ring-4 focus:ring-blue-100 text-xl font-bold" required>
                <div onclick="fe.click()" ondragover="event.preventDefault()" ondrop="event.preventDefault(); fe.files=event.dataTransfer.files; fe.onchange()" class="border-4 border-dashed border-blue-50 rounded-[3rem] p-12 text-center cursor-pointer hover:bg-blue-50/50 transition">
                    <div id="dc"><i class="bi bi-cloud-arrow-up text-7xl text-blue-100"></i><p class="text-sm text-slate-400 mt-4 font-black uppercase tracking-widest">Klik atau Tarik Foto</p></div>
                    <input type="file" name="foto" id="fe" class="hidden" required onchange="const r=new FileReader(); r.onload=e=>{pr.src=e.target.result; pr.className='mx-auto max-h-64 rounded-3xl shadow-xl border-4 border-white'; dc.className='hidden'}; r.readAsDataURL(this.files[0])">
                    <img id="pr" class="hidden">
                </div>
                <button type="submit" name="submit" class="w-full bg-slate-800 text-white py-6 rounded-3xl font-black text-2xl hover:bg-black transition shadow-xl">SIMPAN BARANG</button>
            </form>
        </div>
    </div>
</body></html>