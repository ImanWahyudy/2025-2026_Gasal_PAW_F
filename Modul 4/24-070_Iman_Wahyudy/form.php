<?php
require 'validate.inc';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $validName   = validateName($_POST, 'surname', $errors);
        $validAge    = validateAge($_POST, 'age', $errors);
        $validEmail  = validateEmail($_POST, 'email', $errors);
        $validURL    = validateURL($_POST, 'website', $errors);
        $validNilai  = validateNilai($_POST, 'nilai', $errors);
        $validIP     = validateIP($_POST, 'ip', $errors);
        $validDate   = validateDateInput($_POST, 'tanggal', $errors);

        if ($validName && $validAge && $validEmail && $validURL && $validNilai && $validIP && $validDate) {
            echo "<h3 style='color:green;'>Form submitted successfully with no errors.</h3>";
        } else {
            echo "<h3 style='color:red;'>Terjadi kesalahan dalam pengisian form:</h3>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul><hr>";
            include 'form.inc';
        }
    } else {
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>
