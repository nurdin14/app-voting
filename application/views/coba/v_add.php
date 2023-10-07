<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Masukan Judul</td>
                <td>:</td>
                <td>
                    <input type="hidden" name="id">
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
</body>

</html>