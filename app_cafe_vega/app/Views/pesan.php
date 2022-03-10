<?=$this->extend('layout/admin')?>
<?=$this->section('content')?>
<?php
    if (session()->getFlashdata('succes'))
    {
?>
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismis="alert" aria-label="close">Close</button>
    </div>
    <?php
    }
    ?>
<button class="btn btn-primary" data-toggel="modal" data-target="#addMenu">Tambah Pesan</button>
<table class="table stripped  table-hover">
    <thead>
        <th>Id User</th>
        <th>Tanggal</th>
        <th>Total Harga</th>
        <th>No Meja</th>
        <th>Status</th>
        <th>Nama Pemesan</th>
    </thead>
    <?php
            $no=1;
            foreach($data as $row):
        ?>
        <tbody>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['id_user']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['total_harga']?></td>
                <td><?=$row['no_meja']?></td>
                <td><?=$row['status']?></td>
                <td><?=$row['nama_pemesan']?></td>
                <td>
                    <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editPesan-<?=$row['id']?>">Edit</button>
                    <a href ="<?=base_url('/pesan/delete/'.$row['id'])?>" onclick ="return confrim ('yakin mau dihapus')" class="btn btn-danger btn-sm btn-delete">Delete</a>
                </td>
            </tr>
        </tbody>
        <div class="modal fade" id="editPesan-<?=$row['id']?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-titlle" id="example">Tambah Pesan</h5>
                    <button class="close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                </div>
                <form action="<?=base_url('/pesan/edit/'.$row['id'])?>" method="post">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="id_user">Id user</label>
                            <input type="text" name="id_user" class="form-control" id="id_user" placeholder="inputkan id_user" value="<?=$row['id_user']?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="inputkan tanggal" value="<?=$row['tanggal']?>">
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="text" name="total_harga" class="form-control" id="total_harga" placeholder="inputkan total_harga" value="<?=$row['total_harga']?>">
                        </div>
                        <div class="form-group">
                            <label for="no_meja">No Meja</label>
                            <input type="number" name="no_meja" class="form control" id="no_meja" placeholder="inputkan no_meja" value="<?=$row['no_meja']?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" placeholder="inputkan status" value="<?=$row['status']?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" class="form-control" id="nama_pemesan" placeholder="inputkan nama_pemesan" value="<?=$row['nama_pemesan']?>">
                        </div>

    <?php
        $no++;
        endforeach;    
    ?>