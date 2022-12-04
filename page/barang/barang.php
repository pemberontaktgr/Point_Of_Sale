    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barcode</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Profit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->



                    <tbody>
                        <?php

                        $no = 1;

                        $sql = $koneksi->query("select * from tb_barang");

                        while ($data = $sql->fetch_assoc()) {



                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kode_barcode']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['satuan']; ?></td>
                                <td><?php echo $data['stok']; ?></td>
                                <td><?php echo $data['harga_beli']; ?></td>
                                <td><?php echo $data['harga_jual']; ?></td>
                                <td><?php echo $data['profit']; ?></td>
                                <td>
                                    <a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-success">Ubah</a>
                                    <a href="">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah</a>
            </div>