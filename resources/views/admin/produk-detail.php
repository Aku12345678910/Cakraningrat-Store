<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['p'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori 
    FROM produk a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data =mysqli_fetch_array($query);
    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!= '$data[kategori_id]'");

    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $length > $i; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .form-control:focus {
        border-color: #836C2D; 
        box-shadow: 0 0 5px gold; 
    }
    body {
        background-color: #eeece3;
        color: #333;
    }
    h2{
        color: #836C2D;
    }
    .btn-submit {
        background-color:#246F13;
        border: none;
        border-radius: 3px;
        color: white;
        height: 40px;
        width: 70px;
        border-color: #836C2D; 
        box-shadow: 0 0 5px gold;
    }
    .btn.btn-primary {
        background-color:#629E34;
        border: none;
        border-radius: 3px;
        color: white;
        height: 40px;
        width: 70px;
        border-color: #836C2D; 
        box-shadow: 0 0 8px gold;
        padding: 1px;
    }
    .btn.btn-primary:focus, .btn-primary:active {
    background-color: #836C2D; 
    box-shadow: 0 0 5px gold; 
    }
    .btn.btn-danger {
        background-color:#B10C0C;
        border: none;
        border-radius: 3px;
        color: white;
        height: 40px;
        width: 70px;
        border-color: #836C2D; 
        box-shadow: 0 0 8px gold;
        padding: 1px;
    }
    .btn.btn-danger:focus, .btn-danger:active {
    background-color: #836C2D; 
    box-shadow: 0 0 5px gold; 
    }
</style>
<body>
    <?php require "navbar.php";?>
    <div class="container mt-5">
    <h2>Detail Produk</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" 
                    value="<?php echo $data['nama'];?>" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori">Kategori Produk</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="<?php echo $data['kategori_id']; ?>">
                        <?php echo $data['nama_kategori']; ?></option>
                        <?php 
                            while ($dataKategori = mysqli_fetch_array($queryKategori)) { 
                        ?>
                            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                        <?php 
                            } 
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" value="<?php echo $data['harga'];?>" 
                    name="harga" required>
                </div>
                <div>
                    <label for="currentFoto">Current Foto</label>
                    <img src="../image/<?php echo $data['foto']?>" alt="" width="300px">
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail Produk</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail'];?>
                    </textarea>
                </div>
                <div>
                    <label for="ketersediaan_stok">Ketersediaan Stok</label>
                    <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                        <option value="<?php echo $data['ketersediaan_stok'] ?>">
                        <?php echo $data['ketersediaan_stok'] ?></option>
                        <?php
                            if($data['ketersediaan_stok']=='tersedia'){
                        ?>   
                            <option value="habis">Habis</option>  
                        <?php  
                            }
                            else{
                        ?>
                            <option value="tersedia">Tersedia</option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                </div>
            </form>
            <?php
                if(isset($_POST['simpan'])){
                    $nama = htmlspecialchars($_POST['nama']);
                    $kategori = htmlspecialchars($_POST['kategori']);
                    $harga = htmlspecialchars($_POST['harga']);
                    $detail = htmlspecialchars($_POST['detail']);
                    $ketersediaan_stok = htmlspecialchars($_POST['ketersediaan_stok']);

                    $target_dir = "../image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString(20);
                    $new_name = $random_name . "." . $imageFileType;

                    if ($nama == '' || $kategori == '' || $harga == ''){
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                    Nama, kategori dan harga wajib diisi
                    </div>
            <?php
                    }
                    else{
                        $queryUpdate = mysqli_query($con, "UPDATE produk SET kategori_id='$kategori',
                        nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok'
                        WHERE id=$id");

                        if($nama_file!=''){
                            if ($image_size > 2000000) {
            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 2 MB
                            </div>
            <?php
                            }
                            else{
                                if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && 
                                $imageFileType != 'png' && $imageFileType !='gif'){
            ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        File wajib bertipe jpg, png, jpeg atau gif !
                                    </div>
            <?php
                                }
                            else{
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                                $queryUpdate = mysqli_query($con, "UPDATE produk 
                                SET foto='$new_name' WHERE id='$id'");

                                if($queryUpdate){
            ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                        Produk berhasil diupdate
                                </div>
                                <meta http-equiv="refresh" content="1; url=produk.php"/>
            <?php
                                }
                                    else{
                                    echo mysqli_error($con);
                                    }
                                }
                            }
                        }
                    }
                }
            if(isset($_POST['hapus']))
            {$queryHapus= mysqli_query($con, "DELETE FROM produk WHERE id='$id'");

                if($queryHapus){
            ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Produk berhasil dihapus
                    </div>
                    <meta http-equiv="refresh" content="1; url=produk.php"/>
            <?php       
                }
            }
            ?>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>