<?php
// Segitiga sama sisi
echo "1. SEGITIGA SAMA SISI\n";
for ($i = 1; $i <= 5; $i++) {
    for ($j = 5; $j > $i; $j--) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}

// Segitiga sama sisi terbalik
echo "2. SEGITIGA SAMA SISI TERBALIK\n";
for ($i = 5; $i >= 1; $i--) {
    for ($j = 5; $j > $i; $j--) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
?>
