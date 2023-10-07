<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                        <h4>E-Voting HMIF</h4>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="navbar-nav">
                                <a class="nav-link" href="#">Home</a>
                                <a class="nav-link" href="#">Contact</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped my-3 ml-2" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Jumlah Grafik Suara </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kandidat as $r) : $jumlah_data = count($kandidat); ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><img src="<?= base_url() ?>assets/dist/img/<?= $r['foto'] ?>" class="img" style="width:90px;"></td>
                                            <td><?= $r['nama'] ?></td>
                                            <td><?= $r['jumlah'] ?></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: <?= $r['jumlah']; ?>%;" aria-valuenow="<?= $r['jumlah']; ?>%" aria-valuemin="0" aria-valuemax="100"><?= $r['jumlah']; ?>%</div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <center>Ketua HMIF Terpilih Periode <br> 2021 - 2022</center>
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php foreach ($kahim_terpilih as $k) : ?>
                                <span class="card-title">
                                    <img src="<?= base_url() ?>assets/dist/img/<?= $k['foto'] ?>" class="card-img-top img-thumbnail">
                                </span>
                                <span class="card-text"><?= $k['nama']; ?></span>
                                <p>Jumlah suara : <small><?= $k['jumlah']; ?></small></p>
                                <p>
                                <div class="progress">
                                    <div class="progress-bar bg-dark" role="progressbar" style="width: <?= $k['jumlah']; ?>%;" aria-valuenow="<?= $k['jumlah']; ?>%" aria-valuemin="0" aria-valuemax="100"><?= $k['jumlah']; ?>%</div>
                                </div>
                                </p>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>