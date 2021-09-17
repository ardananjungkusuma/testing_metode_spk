<div class="col-lg-12 m-3">
    <?= $this->session->flashdata('message'); ?>
    <?php
    if (!empty($kriteria)) {
    ?>
        <h3>Tabel Kriteria</h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kriteria</th>
                    <th scope="col">Penjelasan Kriteria</th>
                    <th scope="col">Bobot Kriteria</th>
                    <th scope="col">Kategori Bobot</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($kriteria as $k) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $k['nama_kriteria'] ?></td>
                        <td><?= $k['penjelasan_kriteria'] ?></td>
                        <td><?= $k['bobot_kriteria'] ?></td>
                        <td><?= $k['kategori_bobot'] ?></td>
                        <td>
                            <button class="badge badge-success">Edit</button>
                            <button class="badge badge-danger">Delete</button>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    if (!empty($pegawai)) {
    ?>
        <h3>Tabel Pegawai</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pegawai as $p) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $p['nama_pegawai'] ?></td>

                        <td>
                            <button class="badge badge-success">Edit</button>
                            <button class="badge badge-danger">Delete</button>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>