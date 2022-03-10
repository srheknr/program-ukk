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
<button class="btn btn-primary" data-toggel="modal" data-target="#addUser">Tambah User</button>
<table class="table stripped  table-hover">
    <thead>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Jenis Kelamin</th>
        <th>Jenis</th>
        <th>Option</th>
    </thead>
        <?php
            $no=1;
            foreach($data as $row):
        ?>
        <tbody>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['password']?></td>
                <td><?=$row['jenis_kelamin']?></td>
                <td><?=$row['jenis']?></td>
                <td>
                    <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?=$row['id']?>">Edit</button>
                    <a href ="<?=base_url('/user/delete/'.$row['id'])?>" onclick ="return confrim ('yakin mau dihapus')" class="btn btn-danger btn-sm btn-delete">Delete</a>
                </td>
            </tr>
        </tbody>
        <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="example" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-titlle" id="example">Tambah User</h5>
                    <button class="close" data-dismiss="modal" aria-label="close"></button>
                    </div>
                    <form action="<?=base_url('/user/edit/'.$row['id'])?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="inputkan nama" value="<?=$row['nama']?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="inputkan username" value="<?=$row['password']?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" id="password" placeholder="inputkan password" value="<?=$row['username']?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="<?=$row['jenis_kelamin']?>">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" value="<?=$row['jenis']?>">
                                    <option value="manager">Manager</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $no++;
            endforeach;
        ?>
