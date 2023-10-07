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
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped my-3 ml-2" id="example1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($voting as $r) :  ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><img src="<?= base_url() ?>assets/dist/img/<?= $r['foto'] ?>" class="img" style="width:90px;"></td>
                                    <td><?= $r['nama'] ?></td>
                                    <td><?= $r['jumlah'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="#" class="btn btn-danger"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>
        </div>