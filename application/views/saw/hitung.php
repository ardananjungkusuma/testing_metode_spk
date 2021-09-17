<div class="col-lg-12 m-3">
    <div class="row">
        <div class="col-lg-10">
            <h5>Tabel Kriteria</h5>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Penjelasan Kriteria</th>
                        <th scope="col">Bobot Kriteria</th>
                        <th scope="col">Kategori Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <script>
                        var bobot = [];
                        var kategori_bobot = [];
                    </script>
                    <?php
                    $no = 1;
                    foreach ($kriteria as $k) {
                    ?>
                        <script>
                            bobot.push(<?= $k['bobot_kriteria'] ?>);
                            kategori_bobot.push('<?= $k['kategori_bobot'] ?>');
                        </script>
                        <tr>
                            <td><?= $k['nama_kriteria'] ?> - C<?= $no ?></td>
                            <td><?= $k['penjelasan_kriteria'] ?></td>
                            <td><?= $k['bobot_kriteria'] ?></td>
                            <td><?= $k['kategori_bobot'] ?></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12">
            <?php
            if (!empty($kriteria) && $pegawai > 1) {
            ?>
                <h3>Tabel Pengisian Data</h3>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <?php for ($i = 1; $i <= count($kriteria); $i++) {
                            ?>
                                <th>C<?= $i ?></th>
                            <?php
                            } ?>
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
                                <?php for ($i = 1; $i <= count($kriteria); $i++) {
                                ?>
                                    <th>
                                        <input type="number" required id="P<?= $no ?>C<?= $i ?>">
                                    </th>
                                <?php
                                } ?>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" value="Hitung Data" class="btn btn-info" onclick="return hitungData();" />
        </div>
    <?php }
    ?>
    </div>
</div>
<script>
    function hitungData() {
        let jumlahPegawai = <?= count($pegawai) ?>;
        let jumlahKriteria = <?= count($kriteria) ?>;

        //set bobot
        var noBobot = 1;
        for (let i = 0; i < bobot.length; i++) {
            window['B' + noBobot] = bobot[i];
            noBobot++;
        }
        // print bobot
        for (let i = 1; i <= bobot.length; i++) {
            console.log(window['B' + i]);
        }

        // get value inputan
        var noUrut = 1;
        for (let i = 1; i <= jumlahPegawai; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['P' + noUrut + 'C' + j] = document.getElementById('P' + noUrut + 'C' + j).value;
            }
            noUrut++;
        }

        noUrut -= noUrut;

        console.log(kategori_bobot);

        var noUntukKategori = 0;
        window['minmaxcategory'] = [];
        // find max min depends on benefit
        for (let i = 1; i <= jumlahKriteria; i++) {
            window['category' + i] = [];
            for (let j = 1; j <= jumlahPegawai; j++) {
                window['category' + i].push(window['P' + j + 'C' + i]);
            }
            if (kategori_bobot[noUntukKategori] == "Benefit") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.max.apply(Math, window['category' + i]));
            } else if (kategori_bobot[noUntukKategori] == "Cost") {
                console.log(window['category' + i])
                window['minmaxcategory'].push(Math.min.apply(Math, window['category' + i]));
            }
            noUntukKategori++;
        }

        noUntukKategori -= noUntukKategori;

        console.log(minmaxcategory);

        var urutanMinMax = 0;
        for (let j = 1; j <= jumlahKriteria; j++) {
            for (let i = 1; i <= jumlahPegawai; i++) {
                // console.log(kategori_bobot[noUntukKategori]);
                if (kategori_bobot[j - 1] == "Benefit") {
                    window['NP' + i + 'NC' + j] = window['P' + i + 'C' + j] / minmaxcategory[urutanMinMax];
                } else if (kategori_bobot[j - 1] == "Cost") {
                    window['NP' + i + 'NC' + j] = minmaxcategory[urutanMinMax] / window['P' + i + 'C' + j];
                    // console.log(minmaxcategory[urutanMinMax]);
                    // console.log("dibagi");
                    // console.log(window['P' + i + 'C' + j]);
                }
                // console.log(window['NP' + i + 'NC' + j]);
            }
            urutanMinMax++;
        }

        var noUrut = 1;
        for (let i = 1; i <= jumlahPegawai; i++) {
            window['dataNormalisasiPerPegawai' + i] = [];
            for (let j = 1; j <= jumlahKriteria; j++) {
                window['dataNormalisasiPerPegawai' + i].push(window['NP' + noUrut + 'NC' + j]);
            }
            noUrut++;
        }
        noUrut -= noUrut;

        var backToZero = 0;
        var hasilKali = [];
        var finalData = [];
        var hitungTabelFaktor;
        for (let i = 1; i <= jumlahPegawai; i++) {
            for (let j = 1; j <= jumlahKriteria; j++) {
                console.log(window['dataNormalisasiPerPegawai' + i][backToZero] + '*' + window['B' + j]);
                hitungTabelFaktor = window['dataNormalisasiPerPegawai' + i][backToZero] * window['B' + j];
                // console.log(window['dataNormalisasiPerPegawai' + i]);
                hasilKali.push(hitungTabelFaktor);
                console.log("Hasilnya : " + hitungTabelFaktor);
                hitungTabelFaktor = 0;
                backToZero++;
            }
            var sum = hasilKali.reduce(function(a, b) {
                return a + b;
            }, 0);

            // console.log(hitungTabelFaktor);
            finalData.push(sum);
            hasilKali = [];
            backToZero -= backToZero;
        }

        console.log(finalData);
    }
</script>