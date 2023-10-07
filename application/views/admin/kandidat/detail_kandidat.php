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
            <?php foreach($kandidat as $d): ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?= base_url() ?>assets/dist/img/<?= $d['foto'] ?>" class="card-img img-thumbnail">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $d['nama']; ?></h5>
                                <p class="card-text"><small class="text-muted">Kandidat Calon Ketua <?= $d['keterangan'] ?></small></p>
                            </div>
                            <div class="card-footer" style="margin-top:8.2%;">
                            <a href="<?= site_url() ?>admin/ubah_kandidat/<?= $d['id_kandidat'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= site_url() ?>admin/tampil_kandidat" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Tutup</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card mb-3" style="max-width: 540px;">
                            <div class="card-body">
                                <p class="card-text">
                                    <ul>
                                        <li>Visi : <br> - <?= $d['visi']; ?></li>
                                        <li>Misi : <br> - <?= $d['misi']; ?></li>
                                    </ul>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php endforeach; ?>
        </div>
      