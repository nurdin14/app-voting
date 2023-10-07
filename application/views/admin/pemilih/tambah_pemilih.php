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
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="id_pemilih">
                            <input type="text" class="form-control" name="npm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama">
                            <input type="hidden" value="Belum" name="status">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                            <a href="<?= site_url() ?>admin/pemilih" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                            </div>
                        </div>
                    </form>        
                </div>

            </div>
        </div>
      