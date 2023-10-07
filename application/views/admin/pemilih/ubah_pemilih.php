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
                        <?php foreach($pemilih as $p): ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="id_pemilih" value="<?= $p['id_pemilih']; ?>">
                            <input type="text" class="form-control" name="npm" value="<?= $p['npm']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" value="<?= $p['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control">
                                    ~<option value="<?= $p['status'] ?>"><?= $p['status'] ?></option>~

                                    <option value="Belum">Belum</option>
                                    <option value="Sudah">Sudah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= site_url() ?>admin/pemilih" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </form>        
                </div>

            </div>
        </div>
      