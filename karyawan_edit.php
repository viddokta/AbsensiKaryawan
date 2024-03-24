<?php 
require_once("koneksi.php");
error_reporting(0);
session_start();
 ?>
 
<?php 
	include 'koneksi.php';
	$id = $_GET['id_karyawan'];
	$data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'");
    while ($d = mysqli_fetch_array($data)) {
      
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Karyawan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Ubah Data Karyawan</h2>
        <form action="proedit_karyawan.php" method="POST" enctype="multipart/form-data">
            <?php 
                include 'koneksi.php';
                $id = $_GET['id_karyawan'];
                $data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$id'");
                while ($d = mysqli_fetch_array($data)) {
            ?>
            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" readonly name="id_karyawan" value="<?php echo $d['id_karyawan']; ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $d['username']; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Tempat dan Tanggal Lahir</label>
                <input type="text" class="form-control" name="tmp_tgl_lahir" value="<?php echo $d['tmp_tgl_lahir']; ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jenkel">
                    <option value="Laki-laki" <?php if($d['jenkel']=="Laki-laki") echo 'selected="selected"'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($d['jenkel']=="Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Agama</label>
                <select class="form-control" name="agama">
                    <option value="Islam" <?php if($d['agama']=="Islam") echo 'selected="selected"'; ?>>Islam</option>
                    <option value="Kristen" <?php if($d['agama']=="Kristen") echo 'selected="selected"'; ?>>Kristen</option>
                    <option value="Katholik" <?php if($d['agama']=="Katholik") echo 'selected="selected"'; ?>>Katholik</option>
                    <option value="Hindu" <?php if($d['agama']=="Hindu") echo 'selected="selected"'; ?>>Hindu</option>
                    <option value="Buddha" <?php if($d['agama']=="Buddha") echo 'selected="selected"'; ?>>Buddha</option>
                    <option value="KongHuCu" <?php if($d['agama']=="KongHuCu") echo 'selected="selected"'; ?>>KongHuCu</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"><?php echo $d['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input type="text" class="form-control" name="no_tel" value="<?php echo $d['no_tel']; ?>">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan">
                    <?php 
                        $sql = "SELECT * FROM tb_jabatan";
                        $hasil = mysqli_query($koneksi, $sql);
                        while ($data = mysqli_fetch_array($hasil)) {
                            $selected = ($data['jabatan'] == $d['jabatan']) ? 'selected' : '';
                            echo "<option value=\"".$data['jabatan']."\" $selected>".$data['jabatan']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label><br>
                <?php 
                    if ($d['foto'] != '') {
                        echo "<img src=\"images/$d[foto]\" height=150 />";
                    } else {
                        echo "Tidak ada gambar";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>Ubah Foto</label><br>
                <input type="checkbox" name="ubahfoto" value="true"> Centang jika ingin mengubah foto <br>
                <input type="file" name="inpfoto">
            </div>
            <button type="submit" class="btn btn-primary" name="ubahdata">Ubah Data</button>
            <?php } ?>
        </form>
    </div>
</body>
</html>

<?php } ?>
