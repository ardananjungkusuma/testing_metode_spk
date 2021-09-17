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
    <form method="POST" action="<?= base_url() ?>saw/tambah_kriteria">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Kriteria</label>
            <input type="text" required name="nama_kriteria" class="form-control" placeholder="Masukan Kriteria"><br>
            <textarea class="form-control" name="penjelasan_kriteria" rows="4" placeholder="Masukan Penjelasan Mengenai Kriteria Kriteria"></textarea>
            <small id="deskripsi" class="form-text text-muted">Masukan kriteria untuk menentukan pembobotan.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bobot Kriteria</label>
            <select class="form-control" name="bobot_kriteria" id="exampleFormControlSelect1" required>
                <option selected disabled value="">Pilih Bobot Kriteria</option>
                <option value="0.1">Rendah</option>
                <option value="0.15">Cukup</option>
                <option value="0.2">Tinggi</option>
                <option value="0.25">Sangat Tinggi</option>
            </select>
            <small id="deskripsi" class="form-text text-muted">Kategori Bobot Kriteria Penjelasan:
                <ol>
                    <li>0.1 = Rendah</li>
                    <li>0.15 = Cukup</li>
                    <li>0.2 = Tinggi</li>
                    <li>0.25 = Sangat Tinggi</li>
                </ol>
            </small>
        </div>
        <div class="form-group">
            <label>Kategori Bobot(Cost/Benefit)</label>
            <select class="form-control" name="kategori_bobot" id="exampleFormControlSelect1" required>
                <option selected disabled value="">Pilih Kategori Bobot</option>
                <option>Cost</option>
                <option>Benefit</option>
            </select>
            <small id="deskripsi" class="form-text text-muted">Jika cost maka semakin kecil nilai semakin bagus, jika benefit maka semakin besar nilai semakin bagus.</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>