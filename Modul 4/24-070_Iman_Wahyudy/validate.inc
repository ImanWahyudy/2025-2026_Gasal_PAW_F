<?php
function validateName($field_list, $field_name, &$errors = [])
{
    $name = trim($field_list[$field_name] ?? '');
    if (empty($name)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    if (!preg_match("/^[a-zA-Z'-]+$/", $name)) {
        $errors[$field_name] = "Field $field_name hanya boleh berisi huruf (alfabet).";
        return false;
    }

    $name = trim($name);
    $name = strtolower($name);
    $name = strtoupper($name);

    return true;
}

function validateAge($field_list, $field_name, &$errors = [])
{
    $age = trim($field_list[$field_name] ?? '');
    if (empty($age)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    if (!is_numeric($age)) {
        $errors[$field_name] = "Field $field_name harus berupa angka.";
        return false;
    }

    if (is_float($age + 0) || is_int($age + 0)) {
        if ($age < 1 || $age > 120) {
            $errors[$field_name] = "Field $field_name harus di antara 1 sampai 120.";
            return false;
        }
    } else {
        $errors[$field_name] = "Field $field_name harus berupa bilangan bulat atau desimal.";
        return false;
    }

    return true;
}


function validateEmail($field_list, $field_name, &$errors = [])
{
    $email = trim($field_list[$field_name] ?? '');
    if (empty($email)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    $filtered = filter_input(INPUT_POST, $field_name, FILTER_SANITIZE_EMAIL);
    if (empty($filtered)) {
        $errors[$field_name] = "Field $field_name kosong atau tidak valid.";
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
        return false;
    }

    if (!is_string($email)) {
        $errors[$field_name] = "Field $field_name harus berupa string.";
        return false;
    }

    return true;
}

function validateURL($field_list, $field_name, &$errors = [])
{
    $url = trim($field_list[$field_name] ?? '');
    if (empty($url)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[$field_name] = "Format URL tidak valid.";
        return false;
    }

    return true;
}
function validateNilai($field_list, $field_name, &$errors = [])
{
    $nilai = trim($field_list[$field_name] ?? '');
    if (empty($nilai)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    if (!filter_var($nilai, FILTER_VALIDATE_FLOAT)) {
        $errors[$field_name] = "Field $field_name harus berupa angka desimal.";
        return false;
    }

    if ($nilai < 0 || $nilai > 100) {
        $errors[$field_name] = "Field $field_name harus di antara 0 sampai 100.";
        return false;
    }

    return true;
}

function validateIP($field_list, $field_name, &$errors = [])
{
    $ip = trim($field_list[$field_name] ?? '');
    if (empty($ip)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $errors[$field_name] = "Alamat IP tidak valid.";
        return false;
    }

    return true;
}


function validateDateInput($field_list, $field_name, &$errors = [])
{
    $tanggal = trim($field_list[$field_name] ?? '');
    if (empty($tanggal)) {
        $errors[$field_name] = "Field $field_name harus diisi.";
        return false;
    }

    $parts = explode('-', $tanggal);
    if (count($parts) == 3) {
        $year = (int)$parts[0];
        $month = (int)$parts[1];
        $day = (int)$parts[2];
        if (!checkdate($month, $day, $year)) {
            $errors[$field_name] = "Format tanggal tidak valid.";
            return false;
        }
    } else {
        $errors[$field_name] = "Format tanggal harus YYYY-MM-DD.";
        return false;
    }

    return true;
}
?>
