<?php
for ($x = 0; $x <= 100; $x++) {
    if ($x % 10 !== 0) {
        continue;
    }
    echo "the number is " . $x;
    echo "<br>";
}