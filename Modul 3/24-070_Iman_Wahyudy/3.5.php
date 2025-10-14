<?php
// 3.5.1 
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

$students[3] = array("Darren", "220404", "0812345670");
$students[4] = array("Edward", "220405", "0812345671");
$students[5] = array("Fiona", "220406", "0812345672");
$students[6] = array("George", "220407", "0812345673");
$students[7] = array("Hannah", "220408", "0812345674");

// 3.5.2
echo "<b>3.5 Deklarasi dan akses array Multidimensi</b><br>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

for ($row = 0; $row <= 7; $row++) {
    echo "<tr>";
    echo "<td>" . $students[$row][0] . "</td>";
    echo "<td>" . $students[$row][1] . "</td>";
    echo "<td>" . $students[$row][2] . "</td>";
    echo "</tr>";
}
echo "</table><br>";

?>