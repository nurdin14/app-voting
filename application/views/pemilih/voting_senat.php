<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                        <h4>E-Voting SENAT</h4>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="navbar-nav">
                                <a class="nav-link" href="#">Home</a>
                                <a class="nav-link" href="#">Contact</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="row">
                <?php
                $no = 1;
                foreach ($data as $d) :
                ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header" style="border:none;">
                                <img src="<?= base_url() ?>assets/dist/img/<?= $d['foto'] ?>" class="card-img-top img-thumbnail">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title"><?= $d['nama']; ?></h2>
                                <p class="card-text">Kandidat No.<?= $no++; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url() ?>pemilih/proses_vote/<?= $d['id_kandidat']; ?>" class="btn social-auth-links text-center mb-3 btn-block btn-primary" style="border-radius:9px;"> <i class="fas fa-vote-yea"></i> Pilih Kandidat</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>