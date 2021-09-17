<div class="col-lg-12">
    <?php
    if (validation_errors()) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php
    }
    ?>
    <form method="POST" action="<?= base_url() ?>saw/tambah_pegawai">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Pegawai</label>
            <input type="text" required name="nama_pegawai" class="form-control" placeholder="Masukan Nama Pegawai"><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>