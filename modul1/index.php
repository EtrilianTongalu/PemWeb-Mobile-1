<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $nama = array("Fairus Tongalu", "Suriati", "Edwin Tongalu", "Erfan Tongalu", "Etrilian Tongalu");
    $vokal = 0;
    $konsonan = 0;
    $jml_huruf = 0;
    ?>
    <h3>Nama Anggota Keluarga</h3>
    <ol>
        <?php foreach ($nama as $nama) { ?>
            <li><?= $nama; ?>
                <ol type="a">
                    <li>Jumlah kata : <?= str_word_count($nama); ?></li>
                    <?php
                    $convert = str_split($nama);
                    foreach ($convert as $row) {
                        if (preg_match('/^[ ]/', $row[0])) {
                            $jml_huruf;
                        } else {
                            $jml_huruf++;
                        }
                    }
                    ?>
                    <li>Jumlah huruf : <?= $jml_huruf; ?></li>
                    <li>Kebalikan nama : <?= strrev($nama); ?></li>
                    <?php
                    $convert = str_split($nama);
                    foreach ($convert as $row) {
                        if (preg_match('/^[aiueoAIUEO]/', $row[0])) {
                            $vokal = $vokal + 1;
                        } else {
                            if ($row == " ") {
                                $konsonan = $konsonan;
                            } else {
                                $konsonan = $konsonan + 1;
                            }
                        }
                    }
                    ?>
                    <li>Jumlah konsonan : <?= $konsonan; ?></li>
                    <li>Jumlah vokal : <?= $vokal; ?></li>
                    <?php
                    $vokal = 0;
                    $konsonan = 0;
                    $jml_huruf = 0;
                    ?>
                </ol>
            </li>
        <?php } ?>
    </ol>
</body>

</html>
