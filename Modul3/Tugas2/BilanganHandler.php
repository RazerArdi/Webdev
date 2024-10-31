<?php

class BilanganHandler {
    
    // Fungsi cetakBilangan akan menerima parameter bilangan bulat positif $n
    public function cetakBilangan($n) {
        echo "Output Bilangan dari 1 hingga $n:\n";
        echo str_repeat("-", 30) . "\n"; // Membuat garis pemisah
        
        // Perulangan dari 1 hingga n
        for ($i = 1; $i <= $n; $i++) {
            // Mengecek jika $i habis dibagi 4 dan 6
            if ($i % 4 == 0 && $i % 6 == 0) {
                echo "Pemrograman Website 2024\n";
            } 
            // Mengecek jika $i hanya habis dibagi 5
            elseif ($i % 5 == 0) {
                echo "2024\n";
            } 
            // Mengecek jika $i hanya habis dibagi 4 tetapi tidak habis dibagi 6
            elseif ($i % 4 == 0) {
                echo "Pemrograman\n";
            } 
            // Mengecek jika $i hanya habis dibagi 6 tetapi tidak habis dibagi 4
            elseif ($i % 6 == 0) {
                echo "Website\n";
            } 
            // Jika tidak memenuhi kondisi manapun, cetak angka $i
            else {
                echo "$i\n";
            }
        }

        echo str_repeat("-", 30) . "\n"; // Garis pemisah di akhir output
    }
}

// Membuat instance dari kelas BilanganHandler
$bilanganHandler = new BilanganHandler();

// Memanggil metode cetakBilangan dengan input nilai n
$bilanganHandler->cetakBilangan(20);

?>
