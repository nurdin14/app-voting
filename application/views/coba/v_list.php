<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <p>
        <a href="<?= site_url('coba/tambah') ?>">Tambah</a>
    </p>
    <table border="1" cellspacing="0" cellpadding="4">
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <?php $no = 1;
            foreach ($tampil as $t) : ?>
                <td><?= $no++; ?></td>
                <td><?= $t['title']; ?></td>
                <td><img src="<?= base_url() ?>assets/dist/img/<?= $t['image']?>" width="100"></td>
                <td>
                    <a href="<?= site_url('coba/ubah/' . $t['id']); ?>">Ubah</a>
                    <a href="<?= site_url('coba/hapus/' . $t['id']); ?>">Hapus</a>
                </td>
            <?php endforeach; ?>
        </tr>
    </table>
</body>

</html>