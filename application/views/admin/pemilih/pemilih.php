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
                    <a href="<?= site_url() ?>Admin/tambah_pemilih" class="btn btn btn-primary"><i class="fas fa fa-plus"></i> Tambah Data</a>
                    <a href="<?= site_url() ?>Admin/create_import" class="btn btn btn-danger"><i class="fas fa-file-import"></i> Import Data</a>
                    <a href="<?= site_url() ?>assets/file/Format_pemilih.xlsx" class="btn btn btn-success"><i class="fas fa-file-download"></i> Download Template</a>
                    <a href="<?= site_url() ?>admin/truncate" class="btn btn btn-info"><i class="fas fa-sync-alt"></i> Truncate</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) :

                                if ($d['status'] == "Sudah") {
                                    $status = '<a class="btn btn-sm btn-success" href="#">' . $d["status"] . '</a>';
                                } else {
                                    $status = '<a class="btn btn-sm btn-danger" href="#">' . $d["status"] . '</a>';
                                }
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['npm']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $status; ?></td>
                                    <td>

                                        <a href="<?= site_url() ?>Admin/ubah_pemilih/<?= $d['id_pemilih']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit" style="color:white"></i></a>
                                        <a href="<?= site_url() ?>Admin/hapus_pemilih/<?= $d['id_pemilih']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt" style="color:white"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>