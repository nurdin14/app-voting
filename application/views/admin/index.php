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
                <?php 
                    $no = 1; foreach($kandidat as $d):
                ?>
                <div class="col-sm-4">
                <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?= base_url() ?>assets/dist/img/<?= $d['foto'] ?>" class="card-img img-thumbnail">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $d['nama']; ?></h5>
                                <p class="card-text">Suara Diperoleh : <?= $d['jumlah'] ?></p>
                                <p class="card-text">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $d['jumlah']; ?>%;" aria-valuenow="<?= $d['jumlah']; ?>%" aria-valuemin="0" aria-valuemax="100"><?= $d['jumlah']; ?>%</div>
                                    </div>
                                </p>
                                <p class="card-text"><small class="text-muted">Kandidat Calon Ketua HMIF</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    </div>