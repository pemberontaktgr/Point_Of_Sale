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



<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>
                    Tambah Barang
                </h2>
            </div>
            <div class="panel-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Kode Barcode</label>
                                    <input type="text" name="kode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select type="text" name="satuan" class="form-control">
                                        <option value="">-- Pilih Satuan --</option>
                                        <option value="PCS">PCS</option>
                                        <option value="PACK">PACK</option>
                                        <option value="LUSIN">LUSIN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" name="hbeli" id="harga_beli" onkeyup="sum()" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" name="hjual" id="harga_jual" onkeyup="sum()" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Profit</label>
                                    <input type="number" name="profit" id="profit" readonly="" style="background-color: #E7E3E9;" value="0" class="form-control">
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

    $sql = $koneksi->query("insert into tb_barang values('$kode', '$nama', '$satuan', '$stok', '$hbeli', '$hjual', '$profit
    ')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan");
            window.location.href = "?page=barang";
        </script>
<?php
    }
}

?>