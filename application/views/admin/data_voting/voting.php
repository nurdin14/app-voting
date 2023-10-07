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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Vote</th>
                                <th>ID Kandidat</th>
                                <th>Jumlah Suara</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($voting as $d) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['id_vote']; ?></td>
                                    <td><?= $d['id_kandidat']; ?></td>
                                    <td><?= $d['jumlah']; ?></td>
                                    <td>
                                        <a href="<?= site_url() ?>Admin/ubah_voting/<?= $d['id_vote']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit" style="color:white"></i></a>
                                        <a href="<?= site_url() ?>Admin/hapus_voting/<?= $d['id_vote']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" style="color:white"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= site_url() ?>Admin/tambah_voting" class="btn btn btn-primary"><i class="fas fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
        </div>