<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor 2</title>
</head>
<body>
    <h1>Sorting 2 Array</h1>
    <p><b>Nama: Aaron Jevon Benedict Kongdoh</b></p>
    <p><b>NIM : 0806022310014</b></p>
    <form method="post">
        <label for="m">Jumlah item dalam array 1 (m):</label><br>
        <input type="number" id="m" name="m" required min="0"><br><br>

        <label for="nums1">Masukkan array 1 (pisahkan dengan koma, bisa kosong):</label><br>
        <input type="text" id="nums1" name="nums1"><br><br>

        <label for="n">Jumlah item dalam array 2 (n):</label><br>
        <input type="number" id="n" name="n" required min="0"><br><br>

        <label for="nums2">Masukkan array 2 (pisahkan dengan koma, bisa kosong):</label><br>
        <input type="text" id="nums2" name="nums2" value=""><br><br>

        <input type="submit" value="Gabungkan Array">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai input dari form
        $m = (int)$_POST['m']; // Jumlah item array 1
        $n = (int)$_POST['n']; // Jumlah item array 2
        
        // Ambil array dari form
        $nums1 = explode(',', $_POST['nums1']); // Pisah array 1 berdasarkan koma
        $nums1 = array_map('trim', $nums1); 
        $nums2 = explode(',', $_POST['nums2']); // Pisah aray 2
        $nums2 = array_map('trim', $nums2);

        // Pastikan array cuman ada jumlah elemen yang sesuai
        $nums1 = array_slice($nums1, 0, $m); // Ambil sesuai m
        $nums2 = array_slice($nums2, 0, $n); // Ambil sesui n

        // Kalau n > 0, isi nums1 dengan nol; kalau 0 diskip
        if ($n > 0) {
            $nums1 = array_merge($nums1, array_fill(0, $n, 0)); // Isi nol di akhri
        }

        // Fungsi buat merge array
        function gabungkan(&$nums1, $m, $nums2, $n) {
            // Indeks terakhr dari nums1 habis digabung
            $terakhir = $m + $n - 1;

            // Gabungkan dari urutan belakng
            while ($m > 0 && $n > 0) {
                if ($nums1[$m - 1] > $nums2[$n - 1]) {
                    $nums1[$terakhir] = $nums1[$m - 1];
                    $m--;
                } else {
                    $nums1[$terakhir] = $nums2[$n - 1];
                    $n--;
                }
                $terakhir--;
            }

            // Isi nums1 dengan sisa dari nums2, klo ada
            while ($n > 0) {
                $nums1[$terakhir] = $nums2[$n - 1]; // Masukkan sisa nums2
                $n--;
                $terakhir--;
            }
        }

        // Gabungkan array
        gabungkan($nums1, $m, $nums2, $n);

        // Tampilkan hasil gabungan
        echo "<h2>Array yang Digabungkan:</h2>";
        echo implode(", ", $nums1); // Tampilkan hasil
    }
    ?>
</body>
</html>
