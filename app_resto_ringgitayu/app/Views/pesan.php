<?=$this->extend('layout/admin')?>
<?=$this->section('content')?>
<?php
if (session()->getFlashdata('success')){
?>
        <div class="alert alert-success alert-dismissible fade show"role="alert">
            <?= session()->getFlashdata('success')?>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">close</button>
        </div>
<?php
}
?>
<div class="row">
    <div class="col-md-6">
        <form action="<?= base_url('pesan')?>" method="post">
        <div class="card shadow mb-3 border-left-primary">
            <div class="card-body">
                <Mdiv class="form-group">
                    <label for="menu">menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value=" ">Silahkan pilih menu</option>
                        <?php
                        foreach ($data as $key => $val) {
                            ?>
                                 <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>

                            <?php
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input typ="number" class="submit" class="form-control" value="1" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <button typo="submit" class="btn btn-primary">Masukan keranjang</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-6">
            <form action="<?=base_url('pesans')?>" method="post">
            <div class="card shadow mb-3 border-left-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="no_meja">Nomer Meja</label>
                        <input type="number" class="form-control" name="no_meja" id="no_meja">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">simpan</button>
                    </div>
                </div>
            </div>
        </div>  
        </form>
</div>
<div class="card">
    <card class="header">
        <h3 class="card-title">Pesanan</h3>
    </card>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>makanan</th>
                        <th>jumlah</th>
                        <th>harga</th>
                        <th>total harga</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($menu != null) {
                        $no =0;
                        foreach($menu as $val) {
                            $no++
                            ?>    
                            <tr>
                            <td><?=$no?></td>
                            <td><?=$row['nama']?></td>
                            <td><?=$row['jumlah']?></td>
                            <td><?=$row['harga']?></td>
                            <td><?=$row['harga'] = $val['jumlah'] ?></td>
                            <td>
                                <a herf="<?=base_url('pesan/delete/'.$val['id_menu'])?>" class="btn btn-danger">Hapus</a>
                            </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
         </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">bayar</button>
    </div>
</div>
<?= $this->endSection() ?>