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
                    <form action="" method="post">
                        <?php foreach ($vote as $v) : ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID Kandidat</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id_vote" value="<?= $v['id_vote']; ?>">
                                    <select name="id_kandidat" class="form-control">
                                        <option value="<?= $v['id_kandidat']; ?>"><?= $v['id_kandidat'] ?></option>
                                        <?php foreach ($kandidat as $k) : ?>
                                            <option value="<?= $k['id_kandidat']; ?>"><?= $k['id_kandidat'] ?> - <?= $k['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="jumlah" value="<?= $v['jumlah']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="<?= site_url() ?>admin/tampil_voting" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>

            </div>
        </div>