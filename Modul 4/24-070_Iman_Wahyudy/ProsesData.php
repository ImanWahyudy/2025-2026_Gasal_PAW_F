<?php
require 'validate.inc';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        if (validateName($_POST, 'surname', $errors)) {
            echo "<p>Data OK!</p>";
        } else {
            echo "<p>Data invalid!</p>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }

    } else {
        echo "<p>Tombol submit belum ditekan.</p>";
    }
} else {
    echo "<p>Form belum dikirim.</p>";
}
?>
