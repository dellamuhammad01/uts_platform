<?php $conn = new mysqli("db","root","secret","bukutamu_db");
if($_SERVER['REQUEST_METHOD']=='POST'){ $n=$_POST['nama']; $p=$_POST['pesan']; $conn->query("INSERT INTO tamu (nama,pesan) VALUES ('$n','$p')"); }
$conn->query("CREATE TABLE IF NOT EXISTS tamu (id INT AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(100), pesan TEXT, tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
$res=$conn->query("SELECT * FROM tamu ORDER BY id DESC");
?>
<h2>Buku Tamu Digital - DELLA RAHMAWATI M - 26110035</h2>
<form method="POST"><input name="nama" placeholder="Nama" required><br><br><textarea name="pesan" placeholder="Pesan" required></textarea><br><br><button>Kirim</button></form><hr>
<?php while($r=$res->fetch_assoc()){ echo "<p><b>".$r['nama']."</b>: ".$r['pesan']." - ".$r['tanggal']."</p>"; } ?>
