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
                    <div class="card-text"><?= $this->session->flashdata('pesan'); ?></div>
                    <a href="<?= site_url() ?>Admin/tambah_kandidat" class="btn btn btn-primary"><i class="fas fa fa-plus"></i> Tambah Data</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kandidat as $d) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><img src="<?= base_url() ?>assets/dist/img/<?= $d['foto'] ?>" class="card-img-top img-thumbnail" style="width:60px;"></td>
                                    <td>

                                        <a href="<?= site_url() ?>Admin/detail_kandidat/<?= $d['id_kandidat']; ?>" class="btn btn-sm btn-success"><i class="fas fa-search-plus" style="color:white"></i></a>
                                        <a href="<?= site_url() ?>Admin/ubah_kandidat/<?= $d['id_kandidat']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit" style="color:white"></i></a>
                                        <a href="<?= site_url() ?>Admin/hapus_kandidat/<?= $d['id_kandidat']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" style="color:white"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>