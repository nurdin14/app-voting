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
                <div class="card-body">
                    <div class="alert bg-info">
                        Apakah Pilihan Anda Yakin, Silahkan Klik Lanjutkan Untuk Proses Pemilihan
                        <?php foreach($kandidat as $d): ?>
                            <form action="" method="post">
                                <input type="hidden" name="id_kandidat" value="<?= $d['id_kandidat']; ?>">
                                <button class="btn btn-primary" name="simpan">Lanjut</button>
                                <a href="<?= site_url() ?>admin/voting" class="btn btn-danger" style="tex-decoration:none;"><i class="fas fa-times-circle"></i> Batal</a>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
      