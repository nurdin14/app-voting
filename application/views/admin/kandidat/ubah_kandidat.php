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
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php foreach ($kandidat as $k) : ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" name="id_kandidat" value="<?= $k['id_kandidat'] ?>">
                                    <input type="text" class="form-control" name="nama" value="<?= $k['nama'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Visi</label>
                                <div class="col-sm-8">
                                    <textarea name="visi" cols="30" rows="10" class="form-control">
                                <?= $k['visi']; ?>
                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Misi</label>
                                <div class="col-sm-8">
                                    <textarea name="misi" cols="30" rows="10" class="form-control">
                                <?= $k['misi']; ?>
                            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="foto">
                                    <input type="hidden" name="foto_old" value="<?= $k['foto'] ?>">
                                    <img src="<?= base_url('assets/dist/img/' . $k['foto']) ?>" width="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <select name="keterangan" class="form-control">
                                        <option value="<?= $k['keterangan'] ?>"></option>
                                        <option value="BPM">BPM</option>
                                        <option value="SENAT">SENAT</option>
                                        <option value="HIMA">HIMA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                                    <a href="<?= site_url() ?>admin/tampil_kandidat" class="btn btn-danger"><i class="fas fa-times-circle"></i> Batal</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>

            </div>
        </div>