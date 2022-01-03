<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table width="50%" cellspacing="2">
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 20%;">ID Komoditi</th>
                <th style="width: 50%;">Nama Komoditi</th>
                <th style="width: 20%;">Stok</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $i=0;
             foreach ($product as $row) : ?>
                <tr>
                    <td style="text-align:right," scope="row"><?=$i++; ?></td>
                    <td style="text-align:right" scope="row"><?= $row['id_komoditi']; ?></td>
                    <td ><?= $row['nama_komoditi']; ?></td>
                    <td style="text-align:right"><?= $row['jumlah']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>