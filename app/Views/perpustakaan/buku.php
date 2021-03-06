<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <br><br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-tambah">+ Tambah Data</button>
        <br><br>
        <table class="table table-dark table-striped">
            <tr>
                <th style="width: 10px">NO</th>
                <th>Kode buku</th>
                <th>Judul Buku</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($dataBuku as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->kode_buku; ?> </td>
                    <td><?= $row->buku; ?> </td>
                    <td><?= $row->stok; ?> </td>
                    <td>RP.<?= $row->harga; ?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal-edit" <?= $row->kode_buku; ?>>Edit</button>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('Apakah Data Ingin Di Hapus?')"  href="<?php echo base_url('buku/hapus'); ?>/<?= $row->kode_buku; ?>">hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

    </div>
    <div class="modal fade" id="Modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url('buku/simpan'); ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="col-form-label">kode buku</label>
                            <input type="text" class="form-control" id="kodebuku" name="kodebuku" placeholder="kode buku">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="buku" name="buku" placeholder="Judul Buku">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                        <button type="submit" class="btn btn-primary">masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $no = 1;
            foreach ($dataBuku as $row) : ?>
    <div class="modal fade" id="Modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url('buku/edit'); ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                    <input type="hidden"  value="<?= $row->id_buku; ?>" name="id_buku" >
                        <div class="mb-3">
                            <label class="col-form-label">kode buku</label>
                            <input value="<?= $row->kode_buku; ?>" type="text" class="form-control"  name="kodebuku" placeholder="kode buku">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Judul Buku</label>
                            <input value="<?= $row->buku; ?>" type="text" class="form-control"  name="buku" placeholder="Judul Buku">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Stok</label>
                            <input  value="<?= $row->stok; ?>" type="number" class="form-control" name="stok" placeholder="Stok">
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Harga</label>
                            <input  value="<?= $row->harga; ?>" type="number" class="form-control" name="harga" placeholder="Harga">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                        <button type="submit" class="btn btn-primary">edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach?>

</body>

</html>