<?php
$upperLimit = 10; // Max input
$lowerLimit = 1;
$num = null; // Inisialisasi variabel nomor

// Memeriksa apakah formulir telah dikirim
if (isset($_POST['submit'])) {
    // Memeriksa apakah totalNumber telah ditentukan
    if (isset($_POST['totalAngka'])) {
        $num = intval($_POST['totalAngka']); // Mengonversi input ke integer
        // Validasi nomor
        if ($num < $lowerLimit) {
            $num = $lowerLimit; // Mengatur ke batas bawah jika kurang
        }
        if ($num > $upperLimit) {
            $num = $upperLimit; // Mengatur ke batas atas jika lebih
        }
    }
}

// Fungsi untk membuat pola palindrome
function createPalindromePattern($count)
{
    $outputString = "";
    for ($k = 1; $k <= $count; $k++) {
        // Menambahkan spasi untuk membentuk bentuk piramida
        $spaces = str_repeat("&nbsp;", ($count - $k) * 2);
        $outputString .= $spaces;

        // Bagian kiri angka naik
        for ($i = 0; $i < $k; $i++) {
            $outputString .= $i + 1;
        }
        
        // Bagian kanan angka turun
        for ($j = $i - 1; $j > 0; $j--) {
            $outputString .= $j;
        }

        $outputString .= "<br>"; // Menambahkan baris baru setelah setiap pola
    }
    return $outputString;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 1</title>
</head>

<body>
    <h1>Palindrome Angka Generator</h1>
    <p><b>Nama: Aaron Jevon Benedict Kongdoh</b></p>
    <p><b>NIM : 0806022310014</b></p>
    <form action="" method="post">
        <input type="number" name="totalAngka" placeholder="Total Angka (<?= $lowerLimit . ' - ' . $upperLimit; ?>)" required>
        <input type="submit" name="submit" value="Buat Palindrome!">
    </form>

    <?php
    // Menampilkan hasl jika angka telah ditentukan
    if (isset($num)) {
        echo "<h2>Hasil Pola Palindrome:</h2>";
        echo createPalindromePattern($num); // Menampilkan hasil paldromenya
    }
    ?>
</body>

</html>
