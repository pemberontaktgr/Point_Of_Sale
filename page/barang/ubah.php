<script>
    function sum() {
        var harga_beli = document.getElementById('harga_beli').value;
        var harga_jual = document.getElementById('harga_jual').value;
        var result = parseInt(harga_jual) - parseInt(harga_beli);
        if (!isNaN(result)) {
            document.getElementById('profit').value = result;
        }
    }
</script>

<?php

$kode2 = $_GET['id'];

$sql = $koneksi->query("select * from tb_barang where kode_barcode ='$kode2'");
$tampil = $sql->fetch_assoc();

$satuan = $tampil['satuan'];

?>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    Ubah Barang
                </h2>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Kode Barcode</label>
                                    <input type="text" name="kode" value="<?php echo $tampil['kode_barcode']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" value="<?php echo $tampil['nama_barang']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select type="text" name="satuan" class="form-control">
                                        <option value="PCS" <?php if ($satuan == 'PCS') {
                                                                echo "selected";
                                                            } ?>>PCS</option>
                                        <option value="PACK" <?php if ($satuan == 'PACK') {
                                                                    echo "selected";
                                                                } ?>>PACK</option>
                                        <option value="LUSIN" <?php if ($satuan == 'LUSIN') {
                                                                    echo "selected";
                                                                } ?>>LUSIN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" value="<?php echo $tampil['stok']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" name="hbeli" id="harga_beli" onkeyup="sum()" value="<?php echo $tampil['harga_beli']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" name="hjual" id="harga_jual" onkeyup="sum()" value="<?php echo $tampil['harga_jual']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Profit</label>
                                    <input type="number" name="profit" id="profit" value="<?php echo $tampil['profit']; ?>" readonly="" style="background-color: #E7E3E9;" value="0" class="form-control">
                                </div>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];
    $hbeli = $_POST['hbeli'];
    $hjual = $_POST['hjual'];
    $profit = $_POST['profit'];

    $sql2 = $koneksi->query("UPDATE tb_barang SET kode_barcode='$kode', nama_barang='$nama', satuan='$satuan', 
        stok='$stok', harga_beli='$hbeli', harga_jual='$hjual', profit='$profit' WHERE kode_barcode='$kode2'");

    if ($sql2) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah");
            window.location.href = "?page=barang";
        </script>
<?php
    }
}

?>