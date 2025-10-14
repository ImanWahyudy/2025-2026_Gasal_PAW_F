<?php
// 3.6.1
echo "<b>3.6.1 Implementasi fungsi array_push()</b><br>";

$fruits = array("Avocado", "Blueberry", "Cerry");
array_push($fruits, "Mango", "Orange");

echo "Setelah menambahkan data dengan array_push():<br>";
echo $fruits[0] . "<br>";
echo $fruits[1] . "<br>";
echo $fruits[2] . "<br>";
echo $fruits[3] . "<br>";
echo $fruits[4] . "<br><br>";

// 3.6.2
echo "<b>3.6.2 Implementasi fungsi array_merge()</b><br>";

$veggies = array("Carrot", "Spinach", "Broccoli");
$combined = array_merge($fruits, $veggies);

echo "Hasil penggabungan array \$fruits dan \$veggies:<br>";
for ($i = 0; $i < 8; $i++) {
    echo $combined[$i] . "<br>";
}
echo "<br>";

// 3.6.3
echo "<b>3.6.3 Implementasi fungsi array_values()</b><br>";

$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "180");
$values = array_values($height);

echo "Nilai-nilai dari array \$height:<br>";
for ($i = 0; $i < 3; $i++) {
    echo $values[$i] . "<br>";
}
echo "<br>";

// 3.6.4
echo "<b>3.6.4 Implementasi fungsi array_search()</b><br>";

$search = array_search("Banana", $combined);

if ($search !== false) {
    echo "Data 'Banana' ditemukan pada indeks: " . $search . "<br>";
} else {
    echo "Data 'Banana' tidak ditemukan dalam array.<br>";
}
echo "<br>";

// 3.6.5
echo "<b>3.6.5 Implementasi fungsi array_filter()</b><br>";

$numbers = array(1, 5, 8, 12, 20, 25);
$filtered = array_filter($numbers, function($num) {
    return $num > 10;
});

echo "Angka yang lebih besar dari 10:<br>";
foreach ($filtered as $val) {
    echo $val . "<br>";
}
echo "<br>";

// 3.6.6
echo "<b>3.6.6 Implementasi berbagai fungsi Sorting pada Array</b><br>";

$colors = array("red", "blue", "green", "yellow");

sort($colors);
echo "Hasil sort() (A - Z):<br>";
for ($i = 0; $i < 4; $i++) {
    echo $colors[$i] . "<br>";
}

rsort($colors);
echo "<br>Hasil rsort() (Z - A):<br>";
for ($i = 0; $i < 4; $i++) {
    echo $colors[$i] . "<br>";
}
?>

